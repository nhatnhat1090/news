<?php
namespace yii\easyii\modules\article\models;

use Yii;
use yii\behaviors\SluggableBehavior;
use yii\easyii\behaviors\SeoBehavior;
use yii\easyii\behaviors\Taggable;
use yii\easyii\models\Photo;
use yii\helpers\StringHelper;
use yii\easyii\helpers\Mail;
use yii\easyii\models\Setting;
use yii\easyii\models\Admin;
use yii\helpers\Url;

class Item extends \yii\easyii\components\ActiveRecord
{
    const STATUS_OFF = 0;
    const STATUS_ON = 1;
    const SCENARIO_POST_TEXT= 'text';
    const SCENARIO_POST_PHOTO = 'photo';
    const SCENARIO_POST_VIDEO = 'video';
    public $cate;

    public static function tableName()
    {
        return 'easyii_article_items';
    }

    public function rules()
    {
        return [
            ['title', 'required'],
            ['text', 'required', 'on' => self::SCENARIO_POST_TEXT],
            ['video_url', 'required', 'on' => self::SCENARIO_POST_VIDEO],
            [['title', 'short', 'text'], 'trim'],
            ['title', 'string', 'max' => 128],
            ['image', 'image'],
            [['category_id', 'views', 'time', 'status', 'type'], 'integer'],
            ['time', 'default', 'value' => time()],
            ['slug', 'match', 'pattern' => self::$SLUG_PATTERN, 'message' => Yii::t('easyii', 'Slug can contain only 0-9, a-z and "-" characters (max: 128).')],
            ['slug', 'default', 'value' => null],
            ['status', 'default', 'value' => self::STATUS_ON],
            ['tagNames', 'safe']
        ];
    }

    public function attributeLabels()
    {
        return [
            'title' => Yii::t('easyii', 'Title'),
            'text' => Yii::t('easyii', 'Text'),
            'short' => Yii::t('easyii/article', 'Short'),
            'image' => Yii::t('easyii', 'Image'),
            'time' => Yii::t('easyii', 'Date'),
            'slug' => Yii::t('easyii', 'Slug'),
            'tagNames' => Yii::t('easyii', 'Tags'),
            'video_url' => Yii::t('easyii', 'Video URL')
        ];
    }

    public function behaviors()
    {
        return [
            'seoBehavior' => SeoBehavior::className(),
            'taggabble' => Taggable::className(),
            'sluggable' => [
                'class' => SluggableBehavior::className(),
                'attribute' => 'title',
                'ensureUnique' => true
            ],
        ];
    }

    public function getCategory()
    {
        return $this->hasOne(Category::className(), ['category_id' => 'category_id']);
    }

    public function getPhotos()
    {
        return $this->hasMany(Photo::className(), ['item_id' => 'item_id'])->where(['class' => self::className()])->sort();
    }

    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
            if ($insert) {
                $this->owner = Yii::$app->user->identity->id;
                $this->status = (IS_ROOT || (ROLE == 'admin')) ? 1 : 2;
                $this->created_at = date('Y-m-d H:i:s');
            } else {
                $this->updated_at = date('Y-m-d H:i:s');
            }
            
            $settings = Yii::$app->getModule('admin')->activeModules['article']->settings;
            $this->short = StringHelper::truncate($settings['enableShort'] ? $this->short : strip_tags($this->text), $settings['shortMaxLength']);
            
            if(!$insert && $this->image != $this->oldAttributes['image'] && $this->oldAttributes['image']){
                @unlink(Yii::getAlias('@webroot').$this->oldAttributes['image']);
            }

            return true;
        } else {
            return false;
        }
    }
    
    public function afterSave($insert, $changedAttributes)
    {
            parent::afterSave($insert, $changedAttributes);
            if ($insert) {
                $receivers = [Setting::get('admin_email')];
                $admins = Admin::find()->where(['role' => 'admin'])->all();

                foreach ($admins as $item) {
                    if ($item->cate_manage && in_array($this->category->tree, explode(',', $item->cate_manage))) {
                        $receivers[] = $item->email;
                    }
                }
                $subject = 'Thông báo biên tập viên đăng bài mới' . '[' .  date('d/m/Y H:i'). ']';
                $message = 'Thành viên <b>' . Yii::$app->user->identity->username . '</b> vừa đăng một bài viết mới';
                //Case editor create a new article
                if (ROLE == 'editor') {
                    foreach ($receivers as $to) {
                        $this->sendNotify($to, $subject, $message);
                    }  
                }
            } else {
                //Case Admin or Root approve or unapprove an article
                $owner = Admin::findOne($this->owner);
                if ($owner && ($owner->role == 'editor') && isset($changedAttributes['status'])) {
                    $subject = 'Thông báo quản trị đã ';
                    $subject .= ($this->status == '1') ? 'duyệt bài viết' : 'hủy bài viết'; 
                    $subject .= '[' .  date('d/m/Y H:i'). ']';
                    $message = 'Quản trị viên <b>' . Yii::$app->user->identity->username . '</b> vừa ';
                    $message .= ($this->status == '1') ? 'duyệt bài viết' : 'hủy bài viết';
                    $this->sendNotify($owner->email, $subject, $message);
                }
            }
            
    }

    public function afterDelete()
    {
        parent::afterDelete();

        if($this->image){
            @unlink(Yii::getAlias('@webroot').$this->image);
        }

        foreach($this->getPhotos()->all() as $photo){
            $photo->delete();
        }
    }
    
    public function sendNotify($sendTo, $subject, $message)
    {
        return Mail::send(
            $sendTo,
            $subject,
            '@easyii/modules/article/mail/vi/notify',
            [
                'postTitle' => $this->title, 
                'link' => Url::to(['/admin/article/items', 'id' => $this->category_id], true),
                'message' => $message
            ],
            ['replyTo' => Setting::get('admin_email'), 'from' => [Setting::get('robot_email') => 'Mạng giáo dục Việt Nam']]
        );
    }
}
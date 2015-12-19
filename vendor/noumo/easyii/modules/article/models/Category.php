<?php
namespace yii\easyii\modules\article\models;
use Yii;

class Category extends \yii\easyii\components\CategoryModel
{
    public static function tableName()
    {
        return 'easyii_article_categories';
    }

    public function getItems()
    {
        if (IS_ROOT || (ROLE == 'admin')) {
            return $this->hasMany(Item::className(), ['category_id' => 'category_id'])->sortDate();
        } else {
            return $this->hasMany(Item::className(), ['category_id' => 'category_id'])->where(['owner' => Yii::$app->user->identity->id])->sortDate();
        }
    }

    public function afterDelete()
    {
        parent::afterDelete();

        foreach ($this->getItems()->all() as $item) {
            $item->delete();
        }
    }
}
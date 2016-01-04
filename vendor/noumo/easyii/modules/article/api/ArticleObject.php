<?php
namespace yii\easyii\modules\article\api;

use Yii;
use yii\easyii\components\API;
use yii\easyii\models\Photo;
use yii\easyii\modules\article\models\Item;
use yii\helpers\Url;

class ArticleObject extends \yii\easyii\components\ApiObject
{
    /** @var  string */
    public $slug;

    public $image;

    public $views;

    public $time;

    /** @var  int */
    public $category_id;

    private $_photos;

    public function getTitle(){
        return $this->model->title;
    }

    public function getShort(){
        return $this->model->short;
    }

    public function getText(){
        return $this->model->text;
    }

    public function getCat(){
        return Article::cats()[$this->category_id];
    }

    public function getTags(){
        return $this->model->tagsArray;
    }

    public function getDate(){
        return date('d/m/Y', $this->time);
    }

    public function getPhotos()
    {
        if(!$this->_photos){
            $this->_photos = [];

            foreach(Photo::find()->where(['class' => Item::className(), 'item_id' => $this->id])->sort()->all() as $model){
                $this->_photos[] = new PhotoObject($model);
            }
        }
        return $this->_photos;
    }

    public function getEditLink(){
        return Url::to(['/admin/article/items/edit/', 'id' => $this->id]);
    }
}
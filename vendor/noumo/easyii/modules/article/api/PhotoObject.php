<?php
namespace yii\easyii\modules\article\api;

use Yii;
use yii\easyii\components\API;
use yii\helpers\Html;
use yii\helpers\Url;

class PhotoObject extends \yii\easyii\components\ApiObject
{
    public $image;
    public $description;

    public function box($width, $height){
        $img = Html::img($this->thumb($width, $height));
        $a = Html::a($img, $this->image, [
            'class' => 'easyii-box',
            'rel' => 'article-'.$this->model->item_id,
            'title' => $this->description
        ]);
//         <li data-responsive="images/1-375.jpg 375, images/1-480.jpg 480, images/1.jpg 800" data-src="images/1-1600.jpg" data-sub-html="<h4>Fading Light</h4><p>Classic view from Rigwood Jetty on Coniston Water an old archive shot similar to an old post but a little later on.</p>">
//                    <a href="">
//                        <img class="img-responsive" src="images/1.jpg">
//                    </a>
//                </li>
        return $a;
    }
    
}
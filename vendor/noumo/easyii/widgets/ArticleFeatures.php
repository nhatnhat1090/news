<?php
namespace yii\easyii\widgets;

use Yii;
use yii\base\Widget;
use yii\base\InvalidConfigException;
use yii\easyii\modules\article\api\Article;

class ArticleFeatures extends Widget
{
    public $type;
    public $limit = 5;
    public $title;

    public function init()
    {
        parent::init();
//
//        if (empty($this->model)) {
//            throw new InvalidConfigException('Required `model` param isn\'t set.');
//        }
    }

    public function run()
    {
        $data = [];
        if ($this->type == 'lastest') {
            $data = Article::last($this->limit);
        }
        
        echo $this->render('article_features', [
            'data' => $data,
            'type'  =>  $this->type,
            'title' => $this->title
        ]);
    }

}
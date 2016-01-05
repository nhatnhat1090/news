<?php

namespace app\controllers;

use yii\easyii\modules\article\api\Article;

class ArticlesController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionCat($slug, $tag = null)
    {
        $cat = Article::cat($slug);

        if(!$cat){
            throw new \yii\web\NotFoundHttpException('Article category not found.');
        }

        if (($cat->depth == 0) && (Article::cateChild($cat->id))) {
            $top = Article::topOfRootCate($cat->id);
            return $this->render('cat_root', [
                'cat' => $cat,
                'top' => $top
            ]);
        } else {
            return $this->render('cat', [
                'cat' => $cat,
                'items' => $cat->items(['tags' => $tag, 'pagination' => ['pageSize' => 20]])
            ]);
        }
    }

    public function actionView($slug)
    {
        
        $article = Article::get($slug);
        if(!$article){
            throw new \yii\web\NotFoundHttpException('Article not found.');
        }
        $related = Article::related($article->cat->category_id, $article->model->item_id, 5);

        return $this->render('view', [
            'article' => $article,
            'related' => $related
        ]);
    }

}

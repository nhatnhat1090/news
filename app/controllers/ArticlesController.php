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
                'items' => Article::items(['tags' => $tag, 'where' => ['category_id' => $cat->id], 'pagination' => ['pageSize' => 20]])
                //'items' => $cat->items(['tags' => $tag, 'pagination' => ['pageSize' => 100]])
            ]);
        }
    }

    public function actionView($slug)
    {
        
        $article = Article::get($slug);
        if(!$article){
            throw new \yii\web\NotFoundHttpException('Article not found.');
        }
        if ($slug == 'edulink') {
            $this->redirect(['/']);
        }
        $type = $article->model->type;
        
        if ($type == 1) {
            $related = Article::related($article->cat->category_id, $article->model->item_id, 5);
            $view = 'view';
        } elseif (($type == 2) || ($type == 3)) {
            $view = 'media';
            $related = Article::related($article->cat->category_id, $article->model->item_id, 5, false);
        }


        return $this->render($view, [
            'article' => $article,
            'related' => $related
        ]);
    }
    
    public function actionSearch($keyword)
    {
        $this->layout = "one_column";
        $conditions = [
            'or',
            ['like', 'title', $keyword],
            ['like', 'short', $keyword],
            ['like', 'text', $keyword]
        ];
        $items =  Article::items(['where' => $conditions, 'pagination' => ['pageSize' => 20]]);
        
        return $this->render('search', ['keyword' => $keyword, 'items' => $items]);
    }

}

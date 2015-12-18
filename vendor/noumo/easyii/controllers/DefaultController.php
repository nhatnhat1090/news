<?php
namespace yii\easyii\controllers;

class DefaultController extends \yii\easyii\components\Controller
{
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }
    
    
    public function actionIndex()
    {
        return $this->render('index');
    }
}
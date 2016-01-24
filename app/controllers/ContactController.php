<?php

namespace app\controllers;
use yii\data\ActiveDataProvider;
use yii\easyii\modules\feedback\models\Feedback;

class ContactController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }
    
    public function actionAsk()
    {
        return $this->render('ask');
    }
    
    public function actionFeedback()
    {
        $data = new ActiveDataProvider([
            'query' => Feedback::find()->status(Feedback::STATUS_ANSWERED)->asc(),
        ]);
        
        return $this->render('feedback', [
            'data' => $data
        ]);
    }

}

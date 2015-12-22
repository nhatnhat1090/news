<?php
namespace yii\easyii\controllers;

use Yii;
use yii\easyii\models;

class SignController extends \yii\web\Controller
{
    public $layout = 'empty';
    public $enableCsrfValidation = false;

    public function actionIn()
    {
        $model = new models\LoginForm;

        if (!Yii::$app->user->isGuest || ($model->load(Yii::$app->request->post()) && $model->login())) {
            return $this->redirect(Yii::$app->user->getReturnUrl(['/admin']));
        } else {
            return $this->render('in', [
                'model' => $model,
                'name' => models\Setting::get('backend_name') ? models\Setting::get('backend_name') : 'Admin Panel'
            ]);
        }
    }

    public function actionOut()
    {
        Yii::$app->user->logout();
        Yii::$app->cache->flush();
        //return $this->redirect(Yii::$app->homeUrl);
        return Yii::$app->getResponse()->redirect(['/admin/sign/in'])->send();
    }
}
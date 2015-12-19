<?php
namespace yii\easyii;

use Yii;
use yii\web\View;
use yii\base\Application;
use yii\base\BootstrapInterface;

use yii\easyii\models\Module;
use yii\easyii\models\Setting;
use yii\easyii\assets\LiveAsset;

class AdminModule extends \yii\base\Module implements BootstrapInterface
{
    const VERSION = 0.9;

    public $settings;
    public $activeModules;

    public function init()
    {
        parent::init();

        if(Yii::$app->cache === null){
            throw new \yii\web\ServerErrorHttpException('Please configure Cache component.');
        }

        $this->activeModules = Module::findAllActive();

        $modules = [];
        foreach($this->activeModules as $name => $module){
            $modules[$name]['class'] = $module->class;
            if(is_array($module->settings)){
                $modules[$name]['settings'] = $module->settings;
            }
        }
        $this->setModules($modules);

        define('IS_ROOT',  !Yii::$app->user->isGuest && Yii::$app->user->identity->isRoot());
        if (!Yii::$app->user->isGuest) {
            define('ROLE',  Yii::$app->user->identity->role);
        }
    }

    public function bootstrap($app)
    {
        Yii::setAlias('easyii', '@vendor/noumo/easyii');
    }
}
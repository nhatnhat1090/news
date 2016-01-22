<?php
namespace app\assets;

class FrontAsset extends \yii\web\AssetBundle
{
    public $sourcePath = '@app/media';
    public $css = [
        'css/bootstrap.css',
        'css/font-awesome.css',
        'css/normalize.css',
        'css/owl.carousel.css',
        'css/main.css',
    ];

    public $js = [
        'js/owl.carousel.js',
        'js/jquery.nicescroll.js',
        'js/main.js'
    ];
    
    public $depends = [
        'yii\web\JqueryAsset',
//        'yii\bootstrap\BootstrapAsset',
//        'yii\bootstrap\BootstrapPluginAsset',
    ];
}

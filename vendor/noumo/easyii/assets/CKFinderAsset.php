<?php
namespace yii\easyii\assets;

class CKFinderAsset extends \yii\web\AssetBundle
{
    public $sourcePath = '@easyii/assets/ckfinder';
    public $js = [
        'ckfinder.js'
    ];
    public $depends = [
        'yii\web\JqueryAsset',
    ];
}

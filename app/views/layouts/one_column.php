<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\easyii\widgets\ArticleFeatures;
use yii\easyii\modules\carousel\api\Carousel;

$asset = \app\assets\FrontAsset::register($this);
?>
<?php $this->beginContent('@app/views/layouts/base.php'); ?>
<div class="cols">
    <div class="cols">
       <?= $content ?> 
    </div>
</div>
<?php $this->endContent(); ?>

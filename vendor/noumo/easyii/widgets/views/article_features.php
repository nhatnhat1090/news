<?php
use yii\helpers\Html;
use yii\helpers\Url;
?>
<div class="top-news__container col-xs-12 col-sm-6 col-md-12">
    <div class="top-news__header-group top-news__header-group__orange">
        <h2><?= $title ?></h2>
    </div>
    <div class="top-news__list">
        <?php foreach($data as $item): ?>
        <a class="top-news__item" href="<?= Url::to(['articles/view', 'slug' => $item->slug]); ?>">
            <div class="col-xs-25 top-news__item-img">
                <?= Html::img($item->thumb(165, 110)) ?>
            </div>
            <div class="col-xs-35 top-news__item-text">
                <?= $item->title ?>
            </div>
        </a>
        <?php endforeach; ?>
    </div>
</div>
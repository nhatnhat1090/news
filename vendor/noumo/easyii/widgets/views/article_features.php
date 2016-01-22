<?php

use yii\helpers\Html;
use yii\helpers\Url;
?>

<div class="box">
    <div class="box-caption">
        <a href="#"><?= $title ?></a>
    </div>
    <div class="box-content">
        <ul class="top-news">
            <?php foreach ($data as $item): ?>
                <li class="group">
                    <a href="<?= Url::to(['articles/view', 'slug' => $item->slug]); ?>">
                        <div class="effect-img">
                            <?= Html::img($item->thumb(99, 66)) ?>
                        </div>
                        <p><?= $item->title ?></p>
                    </a>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
</div>
<!--end box-->
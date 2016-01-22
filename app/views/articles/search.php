<?php

use yii\easyii\modules\article\api\Article;
use yii\helpers\Url;
use yii\helpers\Html;

$this->title = 'Tìm kiếm';
$asset = \app\assets\FrontAsset::register($this);
?>
<div class="contact">
    <h2 class="caption-contact">
        tìm kiếm
    </h2>


    <div class="search-box group">
        <form method="GET">
            <input type="text" name="keyword" placeholder="<?= $keyword ?>" />
            <input type="submit" value="Tìm kiếm" />
        </form>
    </div>
    <p>Có <?= count($items) ?> kết quả tìm kiếm cho <span style="color:#197abe;">"<?= $keyword ?>"</span></p>
    <?php 
        foreach ($items as $item): 
            $a_option = ($item->model->type == 4) ? ['target' => '_blank'] : [];
    ?>
    <div class="search-item">
        <?= Html::img($item->thumb(58, 58)) ?>
        <h3><?= Html::a($item->title, $item->model->link ? $item->model->link : ['articles/view', 'slug' => $item->slug], $a_option) ?></h3>
        <p><?= Article::shortcut($item->short, 15) ?></p>
        <span class="link">
            <a href="<?= Url::to(['/articles/cat', 'slug' => $item->cat->slug]) ?>"><?= $item->cat->title;  ?></a>
        </span>
    </div>
    <?php endforeach; ?>
</div>

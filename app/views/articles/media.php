<?php

use yii\easyii\modules\article\api\Article;
use yii\helpers\Html;
use yii\helpers\Url;

$asset = \app\assets\FrontAsset::register($this);
$this->registerCssFile($asset->baseUrl . '/js/plugin/dist/css/lightgallery.css', [
    'depends' => [\app\assets\FrontAsset::className()],
]);
$this->registerJs("$('#lightgallery').lightGallery();", 4);
$this->registerJsFile('https://cdn.jsdelivr.net/picturefill/2.3.1/picturefill.min.js', [
    'depends' => [\app\assets\FrontAsset::className()],
]);
$this->registerJsFile($asset->baseUrl . '/js/plugin/dist/js/lightgallery.js', [
    'depends' => [\app\assets\FrontAsset::className()],
]);
$this->registerJsFile($asset->baseUrl . '/js/plugin/dist/js/lg-fullscreen.js', [
    'depends' => [\app\assets\FrontAsset::className()],
]);
$this->registerJsFile($asset->baseUrl . '/js/plugin/dist/js/lg-thumbnail.js', [
    'depends' => [\app\assets\FrontAsset::className()],
]);
$this->registerJsFile($asset->baseUrl . '/js/plugin/dist/js/lg-video.js', [
    'depends' => [\app\assets\FrontAsset::className()],
]);
$this->registerJsFile($asset->baseUrl . '/js/plugin/dist/js/lg-autoplay.js', [
    'depends' => [\app\assets\FrontAsset::className()],
]);
$this->registerJsFile($asset->baseUrl . '/js/plugin/dist/js/lg-zoom.js', [
    'depends' => [\app\assets\FrontAsset::className()],
]);
$this->registerJsFile($asset->baseUrl . '/js/plugin/dist/js/lg-hash.js', [
    'depends' => [\app\assets\FrontAsset::className()],
]);
$this->registerJsFile($asset->baseUrl . '/js/plugin/dist/js/lg-pager.js', [
    'depends' => [\app\assets\FrontAsset::className()],
]);
$this->registerJsFile($asset->baseUrl . '/js/plugin/dist/js/jquery.mousewheel.min.js', [
    'depends' => [\app\assets\FrontAsset::className()],
]);
?>
<div class="sitemap sitemap-color2">
    <span>
        Ảnh & Video
    </span>
</div>

<div class="video-photo">
    <h1><?= $article->title ?></h1>
    <?php if ($article->model->type == 2): ?>
    <div class="video-photo-large">
        <div class="demo-gallery">
            <ul id="lightgallery" class="list-unstyled">
                <?php foreach($article->photos as $key => $photo) : ?>
                <li <?= ($key == 0) ? '' : 'style="display:none;"' ?> data-src="<?= $photo->thumb(500) ?>" data-sub-html="<h4><?= $article->title ?></h4><p><?= $photo->model->description ?></p>">
                    <a href="">
                        <img class="img-responsive" src="<?= $photo->thumb(500) ?>">
                    </a>
                </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
    <?php else: ?>
    <center>
        <iframe width="640" height="360" src="<?= $article->model->video_url ?>?autoplay=1" frameborder="0" allowfullscreen></iframe></center>
    <?php endif; ?>
    <p><strong><?= $article->short ?></strong></p>
    <div class="fb-comments" data-href="<?= Url::to(['articles/view', 'slug' => $article->model->slug], true); ?>" data-width="800" data-numposts="5"></div>
</div>
<?php if($related): ?>
<div class="row">
    <?php foreach($related as $item): ?>
    <div class="col-md-4 col-sm-6 col-xs-12">
        <div class="video-photo-item">
            <div class="effect-img">
                <a href="<?= Url::to(['articles/view', 'slug' => $item->slug]); ?>">
                    <?= Html::img($item->thumb(240, 177)) ?>
                    <span class="<?= ($item->model->type == 2) ? 'photo' : 'video' ?>-ico">
                    </span>
                </a>
            </div>
            <h3>
                <a href="<?= Url::to(['articles/view', 'slug' => $item->slug]); ?>"><?= $item->title ?></a>
            </h3>

            <span class="count-view"><i class="fa fa-eye"><?= $item->views ?></i></span>
        </div>
    </div>
    <?php endforeach; ?>
</div>
<?php endif; ?>
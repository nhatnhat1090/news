<?php
use yii\easyii\modules\article\api\Article;
use yii\helpers\Url;
use yii\helpers\Html;

$this->title = $article->seo('title', $article->model->title);

if ($cateParent = Article::cateParent($article->cat->tree, $article->category_id)) {
    $this->params['breadcrumbs'][] = ['label' => $cateParent->title, 'url' => ['articles/cat', 'slug' => $cateParent->slug]];
}
$this->params['breadcrumbs'][] = ['label' => $article->cat->title, 'url' => ['articles/cat', 'slug' => $article->cat->slug]];

$asset = \app\assets\FrontAsset::register($this);
?>
<?php /*
  <h1><?= $article->seo('h1', $article->title) ?></h1>

  <?= $article->text ?>

  <?php if(count($article->photos)) : ?>
  <div>
  <h4>Photos</h4>
  <?php foreach($article->photos as $photo) : ?>
  <?= $photo->box(100, 100) ?>
  <?php endforeach;?>
  <?php Article::plugin() ?>
  </div>
  <br/>
  <?php endif; ?>
  <p>
  <?php foreach($article->tags as $tag) : ?>
  <a href="<?= Url::to(['/articles/tag', 'slug' => $article->cat->slug, 'tag' => $tag]) ?>" class="label label-info"><?= $tag ?></a>
  <?php endforeach; ?>
  </p>

  <small class="text-muted">Views: <?= $article->views?></small>
 * 
 */ ?>

<div class="news-detail__main-content">
    <h1 class="news-detail__title"><?= $article->model->title ?></h1>
    <div class="news-detail__date">
        <?= date('d/m/Y | H:i', $article->model->time) . ' GMT+7' ?>
    </div>
    <div class="news-detail__body">
        <p style="font-weight: bold;">
            <?= $article->model->short ?>
        </p>
        <!--        <div class="news-detail__image-container">
                    <img src="<?= $asset->baseUrl ?>/img/news-detail-image.png" alt=""/>
                </div>-->
        <p><?= $article->model->text ?></p>
    </div>
    <div class="news-detail__social-container">
        <a href="#" title="">
            <img src="<?= $asset->baseUrl ?>/img/news-detail-facebook.png" alt=""/>
        </a>
        <a href="#" title="">
            <img src="<?= $asset->baseUrl ?>/img/news-detail-twitter.png" alt=""/>
        </a>
        <a href="#" title="">
            <img src="<?= $asset->baseUrl ?>/img/news-detail-google-plus.png" alt=""/>
        </a>
        <a href="#" title="">
            <img src="<?= $asset->baseUrl ?>/img/news-detail-share-plus.png" alt=""/>
        </a>
    </div>
</div>
<div class="news-detail__related-pages">
    <h3 class="news-detail__related-pages-title">BÀI VIẾT LIÊN QUAN</h3>
    <ul class="news-detail__related-pages-list">
        <?php foreach($related as $item): ?>
        <li class="news-detail__related-pages-list-item">
            <?= Html::a($item->title, ['articles/view', 'slug' => $item->slug]) ?>
        </li>
        <?php endforeach; ?>
    </ul>
</div>
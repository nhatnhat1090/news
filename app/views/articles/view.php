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
<div class="sitemap sitemap-color2">
<?php foreach ($this->params['breadcrumbs'] as $item): ?>
<?php if(is_array($item)): ?>
    <a href="<?= Url::to($item['url']) ?>" title=""><?= $item['label'] ?></a>
    <span>
        <i class="fa fa-angle-double-right"></i>
    </span>
<?php else: ?>
    <span><?= $item ?></span>
<?php endif; ?>
<?php endforeach; ?>
</div>

<div class="detail">
    <h1><?= $article->model->title ?></h1>
    <p class="date">
        <?= date('d/m/Y | H:i', $article->model->time) . ' GMT+7' ?>
    </p>
    <p>
        <div class="fb-like" data-href="<?= Url::to(['articles/view', 'slug' => $article->model->slug], true); ?>" data-width="550" data-layout="standard" data-action="like" data-show-faces="true" data-share="true"></div>
	</p>
    <p class="bold"><?= $article->model->short ?></p>
    <p><?= $article->model->text ?></p>
    <div class="news-ref">
        <h3>Bài viết liên quan</h3>
        <ul>
            <?php foreach($related as $item): ?>
            <li><?= Html::a($item->title, ['articles/view', 'slug' => $item->slug]) ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
    
    <div class="fb-comments" data-href="<?= Url::to(['articles/view', 'slug' => $article->model->slug], true); ?>" data-width="800" data-numposts="5"></div>
</div>

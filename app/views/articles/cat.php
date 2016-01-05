<?php
use yii\easyii\modules\article\api\Article;
use yii\helpers\Html;
use yii\helpers\Url;

$this->title = $cat->seo('title', $cat->model->title);
if ($cateParent = Article::cateParent($cat->tree, $cat->id)) {
    $this->params['breadcrumbs'][] = ['label' => $cateParent->title, 'url' => ['articles/cat', 'slug' => $cateParent->slug]];
}
$this->params['breadcrumbs'][] = $cat->model->title;
/*
  ?>
  <h1><?= $cat->seo('h1', $cat->title) ?></h1>
  <br/>

  <?php if(count($items)) : ?>
  <?php foreach($items as $article) : ?>
  <div class="row">
  <div class="col-md-2">
  <?= Html::img($article->thumb(160, 120)) ?>
  </div>
  <div class="col-md-10">
  <?= Html::a($article->title, ['articles/view', 'slug' => $article->slug]) ?>
  <p><?= $article->short ?></p>
  <p>
  <?php foreach($article->tags as $tag) : ?>
  <a href="<?= Url::to(['/articles/cat', 'slug' => $article->cat->slug, 'tag' => $tag]) ?>" class="label label-info"><?= $tag ?></a>
  <?php endforeach; ?>
  </p>
  </div>
  </div>
  <br>
  <?php endforeach; ?>
  <?php else : ?>
  <p>Category is empty</p>
  <?php endif; ?>

  <?= $cat->pages() ?>
 * 
 */
?>
<div class="col-xs-12 col-md-8 gb-column gb-column__big">
    <div class="news-group">
        <div class="news-group__header news-group__header__orange-border news-group__header__no-background">
            <h2 class="news-group__header-menu">
                <?php foreach ($this->params['breadcrumbs'] as $item): ?>
                    <?php if(is_array($item)): ?>
                        <a href="<?= Url::to($item['url']) ?>" title=""><?= $item['label'] ?></a>
                        <span class="category-page__menu-separate">&nbsp;</span>
                    <?php else: ?>
                        <span><?= $item ?></span>
                    <?php endif; ?>
                <?php endforeach; ?>
            </h2>
        </div>
        <div class="news-detail__container">
            <div class="category-page__group-news container-fluid">
                <div class="row">
                    <?php foreach($items as $article) : ?>
                    <div class="col-xs-12 col-sm-6 category-page__group-news-column">
                        <div class="category-page__news-item__big">
                            <?= Html::img($article->thumb(374, 242)) ?>
                            <div class="category-page__news-item__news-date-social">
                                <span class="category-page__news-item__news-date"><?= $article->date; ?></span>
                                <span class="category-page__news-item__news-social-container">
            <!--                        <span class="category-page__news-item__news-social-comment">5</span>
                                    <span class="category-page__news-item__news-social-like">73</span>-->
                                    <span class="category-page__news-item__news-social-seen"><?= $article->views; ?></span>
                                </span>
                            </div>
                            <h3>
                            <?= Html::a('<strong>' . $article->title . '</strong>', ['articles/view', 'slug' => $article->slug]) ?>
                            </h3>
                            <p>
                                <?= $article->short ?>
                            </p>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>

        </div>
    </div>
</div>


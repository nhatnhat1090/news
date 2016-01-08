<?php
use yii\easyii\modules\article\api\Article;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\easyii\modules\carousel\api\Carousel;

$asset = \app\assets\FrontAsset::register($this);
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
    <div class="category-page__top-new-container top-event__event">
        <h1>
            <?= $cat->title ?>
        </h1>
        <?php if($top): ?>
        <a href="#" title="">
            <?= Html::img($top->thumb(779, 342)) ?>
            <div class="top-event__event-text">
                <h4><?= $top->cat->title ?></h4>
                <h2><?= $top->title ?></h2>
                <span><?= $top->date ?></span>
            </div>
        </a>
        <?php endif; ?>
    </div>
    <?php 
        foreach (Article::cateChild($cat->id) as $key => $cateChild): 
            $items = $cateChild->items(['where' => ['not', ['item_id' => $top->id]], 'pagination' => ['pageSize' => 6]]);
    ?>
    <div class="news-group">
        <div class="news-group__header news-group__header__orange-border">
            <h2>
                <?= $cateChild->title; ?>
            </h2>
            <div class="news-group__header__buttons-container">
                <a class="button-item button-item__view-all" href="<?= Url::to(['/articles/cat', 'slug' => $cateChild->slug]) ?>" title="">
                    Xem toàn bộ
                </a>
            </div>
        </div>
        <?php if($items): ?>
        <div class="category-page__group-news container-fluid">
            <div class="row">
                <div class="col-xs-12 col-sm-6 category-page__group-news-column">
                    <div class="category-page__news-item__big">
                        <?= Html::img($items[0]->thumb(374, 242)) ?>
                        <div class="category-page__news-item__news-date-social">
                            <span class="category-page__news-item__news-date"><?= $items[0]->date ?></span>
                            <span class="category-page__news-item__news-social-container">
<!--                                <span class="category-page__news-item__news-social-comment">5</span>
                                <span class="category-page__news-item__news-social-like">73</span>-->
                                <span class="category-page__news-item__news-social-seen"><?= $items[0]->views; ?></span>
                            </span>
                        </div>
                        <h3>
                            <?= Html::a('<strong>'.$items[0]->title.'</strong>', ['articles/view', 'slug' => $items[0]->slug]) ?>
                        </h3>
                        <p>
                            <?= $items[0]->short; ?>
                        </p>
                    </div>
                </div>
                <?php if(isset($items[1])): ?>
                <div class="col-xs-12 col-sm-6 category-page__group-news-column">
                    <div class="category-page__news-item__big">
                        <?= Html::img($items[1]->thumb(374, 242)) ?>
                        <div class="category-page__news-item__news-date-social">
                            <span class="category-page__news-item__news-date"><?= $items[1]->date ?></span>
                            <span class="category-page__news-item__news-social-container">
<!--                                <span class="category-page__news-item__news-social-comment">5</span>
                                <span class="category-page__news-item__news-social-like">73</span>-->
                                <span class="category-page__news-item__news-social-seen"><?= $items[1]->views; ?></span>
                            </span>
                        </div>
                        <h3>
                            <?= Html::a('<strong>'.$items[1]->title.'</strong>', ['articles/view', 'slug' => $items[1]->slug]) ?>
                        </h3>
                        <p>
                            <?= $items[1]->short; ?>
                        </p>
                    </div>
                </div>
                <?php endif; ?>
            </div>
            <?php if(count($items) > 2): ?>
            <div class="row">
                <?php for($i=2;$i<count($items);$i++): ?>
                <div class="col-xs-12 col-sm-6 category-page__group-news-column">
                    <div class="news-group__container__half-medium">
                        <div class="home-news-item__container category-page__small-item">
                            <div class="col-xs-6">
                                <?= Html::a(Html::img($items[$i]->thumb(165, 110)), ['articles/view', 'slug' => $items[$i]->slug]) ?>
                            </div>
                            <div class="col-xs-6">
                                <h4><?= $items[$i]->title ?></h4>
                                <span><?= $items[$i]->date ?></span>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endfor; ?>
            </div>
            <?php endif; ?>
            <?php if ($bodyAds = Carousel::byKey('body_ads_'.($key + 1))): ?>
                <div class="row">
                    <div class="ads-container category-page__ads">
                        <a href="<?= $bodyAds->link ?>" title="<?= $bodyAds->title ?>">
                            <?= Html::img($bodyAds->thumb(728), ['alt' => $bodyAds->title]) ?>
                        </a>
                    </div>
                </div>
            <?php endif; ?>
        </div>
        <?php endif; ?>
    </div>
    <?php endforeach; ?>
</div>


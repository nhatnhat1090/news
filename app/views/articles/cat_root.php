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
$color = [
    'doi-moi-giao-duc' => 'one',
    'du-hoc' => 'color2',
    'nhin-ra-the-gioi' => 'color3',
    'goc-vtv7' => 'color4',
    'edulink' => 'color5',
    'cau-chuyen-giao-duc' => 'color6'
];
?>

<div class="cate-intro">
    <h2><?= $cat->title ?></h2>
    <div class="effect-img">

        <a href="<?= Url::to(['articles/view', 'slug' => $top->slug]) ?>">
            <?= Html::img($top->thumb(547, 259)) ?>
            <p>
                <?= $top->title ?>
            </p>
        </a>
    </div>
</div>
<?php
    foreach (Article::cateChild($cat->id) as $key => $cateChild):
    $items = $cateChild->items(['where' => ['not', ['item_id' => $top->id]], 'pagination' => ['pageSize' => 6]]);
?>  
<div class="category category-<?= isset($color[$cat->slug]) ? $color[$cat->slug] : 'color2'  ?>">
    <div class="category-caption group">
        <label><?= Html::a($cateChild->title, ['articles/cat', 'slug' => $cateChild->slug]) ?></label>
        <a class="readmore" href="<?= Url::to(['/articles/cat', 'slug' => $cateChild->slug]) ?>">
            Xem toàn bộ
            <i class="fa fa-angle-right"></i>
        </a>
    </div>
    <?php if ($items): ?>
    <div class="category-content">
        <div class="row">
            <div class="col-md-6 col-sm-12">
                <div class="item-category-50">
                    <div class="effect-img">

                        <a href="<?= Url::to(['/articles/cat', 'slug' => $items[0]->slug]) ?>">
                            <div>
                            </div>
                            <?= Html::img($items[0]->thumb(374, 243)) ?>
                        </a>

                    </div>
                    <h3><?= Html::a($items[0]->title, ['articles/view', 'slug' => $items[0]->slug]) ?></h3>

                </div>
            </div>
            <div class="col-md-6 col-sm-12">
                 <div class="item-category-50">
                    <div class="effect-img">

                        <a href="<?= Url::to(['/articles/cat', 'slug' => $items[1]->slug]) ?>">
                            <div>
                            </div>
                            <?= Html::img($items[1]->thumb(374, 243)) ?>
                        </a>

                    </div>
                    <h3><?= Html::a($items[1]->title, ['articles/view', 'slug' => $items[1]->slug]) ?></h3>

                </div>
            </div>
        </div>
        <?php if (count($items) > 2): ?>
        <div class="row">
            <?php for ($i = 2; $i < count($items); $i++): ?>
            <div class="col-md-6 col-sm-12">
                <div class="item-category-thumb group">
                    <div class="effect-img">
                        <?= Html::a(Html::img($items[$i]->thumb(164, 108)), ['articles/view', 'slug' => $items[$i]->slug]) ?>
                    </div>
                    <h3><?= Html::a(Article::shortcut($items[$i]->title, 10), ['articles/view', 'slug' => $items[$i]->slug]) ?></h3>
                    <p><?= Article::shortcut($items[$i]->short, 12) ?></p>
                </div>
            </div>
            <?php endfor; ?>
        </div>
        <?php endif; ?>
    </div>
    <?php endif; ?>
</div>
<!--end category-->

<?php if ($bodyAds = Carousel::byKey('body_ads_' . ($key + 1))): ?>
    <div class="ads2 hidden-sm hidden-xs">
        <a href="<?= $bodyAds->link ?>" title="<?= $bodyAds->title ?>">
            <?= Html::img($bodyAds->thumb(778), ['alt' => $bodyAds->title]) ?>
        </a>
    </div>
<?php endif; ?>

<?php endforeach; ?>
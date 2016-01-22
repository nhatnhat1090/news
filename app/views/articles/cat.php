<?php

use yii\easyii\modules\article\api\Article;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\data\Pagination;

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
<div class="sitemap sitemap-<?= isset($color[$cat->slug]) ? $color[$cat->slug] : 'color2'  ?>">
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
<div class="category category-4 category-color-orange">

    <div class="category-content">
        <div class="row">
            <?php 
                foreach($items as $article) : 
                    $a_option = ($article->model->type == 4) ? ['target' => '_blank'] : [];
            ?>
            <div class="col-md-6 col-sm-12">
                <div class="item-category-50">
                    <div class="effect-img">

                        <a <?= ($article->model->type == 4) ? 'target = "_blank"' : '' ?> href="<?= $article->model->link ? $article->model->link : Url::to(['articles/view', 'slug' => $article->slug]) ?>">
                            <div>
                            </div>
                            <?= Html::img($article->thumb(374, 243)) ?>
                        </a>

                    </div>
                    <h3> <?= Html::a(Article::shortcut($article->title, 8), $article->model->link ? $article->model->link : ['articles/view', 'slug' => $article->slug], $a_option) ?></h3>
                    <?php if($article->short): ?>
                        <p><?= Article::shortcut($article->short, 20) ?></p>
                    <?php endif; ?>
                </div>
            </div>
            <?php endforeach; ?>
        </div>



    </div>
</div>
<!--end category-->
<center><?= Article::pages() ?></center>
<!--<span class="loadmore">xem thêm</span>-->
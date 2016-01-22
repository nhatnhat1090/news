<?php

use yii\helpers\Html;
use yii\easyii\modules\article\api\Article;
use yii\easyii\widgets\ArticleFeatures;
use yii\helpers\Url;
use yii\easyii\modules\carousel\api\Carousel;

$asset = \app\assets\FrontAsset::register($this);

$this->title = 'Mạng giáo dục';

//Headnews
$headnews = Article::last(4, ['head' => 1]);

//Đổi mới giáo dục
$cate1 = Article::cat(11);
if($cate1) {
    $pack1 = $cate1->items(['pagination' => ['pageSize' => 3]]);
}

//Du học
$cate2 = Article::cat(5);
if($cate2) {
    $pack2 = $cate2->items(['pagination' => ['pageSize' => 4]]);
}

//Nhìn ra thế giới
$cate3 = Article::cat(2);
if($cate3) {
    $pack3 = $cate3->items(['pagination' => ['pageSize' => 4]]);
}


//Góc VTV7
$cate4 = Article::cat(14);
if($cate4) {
    $pack4 = $cate4->items(['pagination' => ['pageSize' => 4]]);
}

//Edulink
$cate5 = Article::cat(17);
if($cate5) {
    $pack5 = $cate5->items(['pagination' => ['pageSize' => 6]]);
}

//Câu chuyện giáo dục
$cate6 = Article::cat(22);
if($cate6) {
    $pack6 = $cate6->items(['pagination' => ['pageSize' => 4]]);
}

$mostViews = Article::mostView(6);
?>
<?php if($mostViews): ?>
<div class="time-event">
    <span class="time-event-caption">
        DÒNG SỰ KIỆN
    </span>
    <span class="time-event-time">
        <i class="fa fa-clock-o"></i><?= (date("N") == 7) ? 'Chủ nhật' : 'Thứ ' . (date("N") + 1) ?>, <?= date("d/m/Y") ?>
    </span>
    <div class="slider-text" id="owl-text">
        <?php foreach ($mostViews as $item): ?>
            <div class="slider-text-item">
                <?= Html::a($item->title, ['articles/view', 'slug' => $item->slug]) ?>
            </div>
        <?php endforeach; ?>
    </div>
</div>
<?php endif; ?>

<?php if(count($headnews) > 3): ?>
<!--end time-event-->
<div class="intro-home">

    <div class="row">
        <div class="col-md-6 col-sm-12">
            <div class="effect-img intro-box-large">
                <a href="<?= Url::to(['articles/view', 'slug' => $headnews[0]->slug]); ?>" title="<?= $headnews[0]->title ?>">
                    <?= Html::img($headnews[0]->thumb(546, 462)) ?>
                    <p><?= $headnews[0]->title ?></p>
                </a>
            </div>

        </div>
        <div class="col-md-6 col-sm-6 hidden-sm hidden-xs">
            <div class="effect-img intro-box-middle">
                <a href="<?= Url::to(['articles/view', 'slug' => $headnews[1]->slug]); ?>" title="<?= $headnews[1]->title ?>">
                    <?= Html::img($headnews[1]->thumb(547, 259)) ?>
                    <p><?= $headnews[1]->title ?></p>
                </a>
            </div>
            <div class="row">
                <div class="col-md-6 col-sm-12">
                    <div class="effect-img intro-box-small">
                        <a href="<?= Url::to(['articles/view', 'slug' => $headnews[2]->slug]); ?>" title="<?= $headnews[2]->title ?>">
                            <?= Html::img($headnews[2]->thumb(270, 198)) ?>
                            <p><?= $headnews[2]->title ?></p>
                        </a>
                    </div>
                </div>
                <div class="col-md-6 col-sm-12">
                    <div class="effect-img intro-box-small">
                         <a href="<?= Url::to(['articles/view', 'slug' => $headnews[3]->slug]); ?>" title="<?= $headnews[3]->title ?>">
                            <?= Html::img($headnews[3]->thumb(270, 198)) ?>
                            <p><?= $headnews[3]->title ?></p>
                        </a>
                    </div>
                </div>
            </div>

        </div>

    </div>
</div>
<?php endif; ?>

<div class="cols">
    <div class="row">
        <div class=" col-lg-9 col-md-8 col-sm-12">
            <?php if($cate1): ?>
            <div class="category category-one">
                <div class="category-caption group">
                    <label><?= Html::a($cate1->title, ['articles/cat', 'slug' => $cate1->slug]) ?></label>
                    <a class="readmore" href="<?= Url::to(['/articles/cat', 'slug' => $cate1->slug]) ?>">
                        Xem toàn bộ
                        <i class="fa fa-angle-right"></i>
                    </a>
                </div>
                <div class="category-content">
                    <div class="group">
                        <div class="item-category-large group">


                            <div class="effect-img">
                                <?= Html::a('<div></div>' . Html::img($pack1[0]->thumb(359, 176)), ['articles/view', 'slug' => $pack1[0]->slug]) ?>
                            </div>
                            <h3><?= Html::a($pack1[0]->title, ['articles/view', 'slug' => $pack1[0]->slug]) ?></h3>
                            <p><?= Article::shortcut($pack1[0]->short, 50) ?></p>
                        </div>
                    </div>
                    <?php if (count($pack1) > 1): ?>
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <div class="item-category-small">
                                <div class="effect-img">
                                    <a href="<?= Url::to(['articles/view', 'slug' => $pack1[1]->slug]); ?>">
                                        <?= Html::img($pack1[1]->thumb(105, 70)) ?>
                                    </a>
                                </div>
                                <p>
                                    <a href="<?= Url::to(['articles/view', 'slug' => $pack1[1]->slug]); ?>"><?= $pack1[1]->title ?></a>
                                </p>
                            </div>
                        </div>
                        <?php if (isset($pack1[2])):  ?>
                        <div class="col-md-6 col-sm-12">
                            <div class="item-category-small">
                                <div class="effect-img">
                                    <a href="<?= Url::to(['articles/view', 'slug' => $pack1[2]->slug]); ?>">
                                        <?= Html::img($pack1[2]->thumb(105, 70)) ?>
                                    </a>
                                </div>
                                <p>
                                    <a href="<?= Url::to(['articles/view', 'slug' => $pack1[2]->slug]); ?>"><?= $pack1[2]->title ?></a>
                                </p>
                            </div>
                        </div>
                        <?php endif; ?>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
            <!--end category-->
            <?php endif; ?>
            <?php if ($bodyAds1 = Carousel::byKey('body_ads_1')): ?>
                <div class="ads2 hidden-sm hidden-xs">
                    <a href="<?= $bodyAds1->link ?>" title="<?= $bodyAds1->title ?>">
                        <?= Html::img($bodyAds1->thumb(778), ['alt' => $bodyAds1->title]) ?>
                    </a>
                </div>
            <?php endif; ?>
            <?php if($cate2): ?>
            <div class="category category-color2">
                <div class="category-caption group">
                    <label><?= Html::a($cate2->title, ['articles/cat', 'slug' => $cate2->slug]) ?></label>
                    <ul class="category-submenu">
                        <?php foreach (Article::CateChild($cate2->id) as $child): ?>
                            <li><a href="<?= Url::to(['/articles/cat', 'slug' => $child->slug]) ?>"><?= $child->title ?></a></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
                <div class="category-content">
                    <div class="group">
                        <div class="item-category-large group">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <div class="item-category-50">
                                <div class="effect-img">
                                    <?= Html::a('<div></div>' . Html::img($pack2[0]->thumb(359, 176)), ['articles/view', 'slug' => $pack2[0]->slug]) ?>
                                </div>
                                <h3><?= Html::a($pack2[0]->title , ['articles/view', 'slug' => $pack2[0]->slug]) ?></h3>

                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <div class="item-category-50">
                                <div class="effect-img">
                                    <?= Html::a('<div></div>' . Html::img($pack2[1]->thumb(359, 176)), ['articles/view', 'slug' => $pack2[1]->slug]) ?>
                                </div>
                                <h3><?= Html::a($pack2[1]->title , ['articles/view', 'slug' => $pack2[1]->slug]) ?></h3>

                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <div class="item-category-small">
                                <div class="effect-img">
                                    <?= Html::a(Html::img($pack2[2]->thumb(105, 70)), ['articles/view', 'slug' => $pack2[2]->slug]) ?>
                                </div>
                                <p>
                                     <?= Html::a($pack2[2]->title, ['articles/view', 'slug' => $pack2[2]->slug]) ?>
                                </p>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                             <div class="item-category-small">
                                <div class="effect-img">
                                    <?= Html::a(Html::img($pack2[3]->thumb(105, 70)), ['articles/view', 'slug' => $pack2[3]->slug]) ?>
                                </div>
                                <p>
                                     <?= Html::a($pack2[3]->title, ['articles/view', 'slug' => $pack2[3]->slug]) ?>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--end category-->
            <?php endif; ?>
            <?php if ($bodyAds2 = Carousel::byKey('body_ads_2')): ?>
                <div class="ads2 hidden-sm hidden-xs">
                    <a href="<?= $bodyAds2->link ?>" title="<?= $bodyAds2->title ?>">
                        <?= Html::img($bodyAds2->thumb(778), ['alt' => $bodyAds2->title]) ?>
                    </a>
                </div>
            <?php endif; ?>
            <?php if($cate3): ?>
            <div class="category category-color3">
                <div class="category-caption group">
                    <label><?= Html::a($cate3->title, ['articles/cat', 'slug' => $cate3->slug]) ?></label>
                    <a class="readmore" href="<?= Url::to(['/articles/cat', 'slug' => $cate3->slug]) ?>">
                        Xem toàn bộ
                        <i class="fa fa-angle-right"></i>
                    </a>
                </div>
                <div class="category-content">
                    <div class="row">
                        <?php foreach ($pack3 as $item): ?>
                            <div class="col-md-6 col-sm-12">
                                <div class="item-category-thumb group">
                                    <div class="effect-img">
                                        <?= Html::a(Html::img($item->thumb(164, 108)), ['articles/view', 'slug' => $item->slug]) ?>
                                    </div>
                                    <h3><?= Html::a($item->title, ['articles/view', 'slug' => $item->slug]) ?></h3>
                                    <p><?= Article::shortcut($item->short, 18) ?></p>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
            <!--end category-->
            <?php endif; ?>
            <?php if($cate4): ?>
            <div class="category category-color4">
                <div class="category-caption group">
                    <label><?= Html::a($cate4->title, ['articles/cat', 'slug' => $cate4->slug]) ?></label>
                    <a class="readmore" href="<?= Url::to(['/articles/cat', 'slug' => $cate4->slug]) ?>">
                        Xem toàn bộ
                        <i class="fa fa-angle-right"></i>
                    </a>
                </div>
                <div class="category-content">
                    <div class="row">
                        <?php foreach ($pack4 as $item): ?>
                            <div class="col-md-6 col-sm-12">
                                <div class="item-category-thumb group">
                                    <div class="effect-img">
                                        <?= Html::a(Html::img($item->thumb(164, 108)), ['articles/view', 'slug' => $item->slug]) ?>
                                    </div>
                                    <h3><?= Html::a($item->title, ['articles/view', 'slug' => $item->slug]) ?></h3>
                                    <p><?= Article::shortcut($item->short, 18) ?></p>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
            <!--end category-->
            <?php endif; ?>
           <?php if ($bodyAds3 = Carousel::byKey('body_ads_3')): ?>
                <div class="ads2 hidden-sm hidden-xs">
                    <a href="<?= $bodyAds3->link ?>" title="<?= $bodyAds3->title ?>">
                        <?= Html::img($bodyAds3->thumb(778), ['alt' => $bodyAds3->title]) ?>
                    </a>
                </div>
            <?php endif; ?>
            <?php if($cate5): ?>
            <div class="category category-color5">
                <div class="category-caption group">
                    <label><?= Html::a($cate5->title, ['articles/cat', 'slug' => $cate5->slug]) ?></label>
                    <a class="readmore" href="<?= Url::to(['/articles/cat', 'slug' => $cate5->slug]) ?>">
                        Xem toàn bộ
                        <i class="fa fa-angle-right"></i>
                    </a>
                </div>
                <div class="category-content">

                    <div class="slider-edulink-outer">

                        <div class="slider-edulink">
                            <?php foreach($pack5 as $item): ?>
                            <div class="slider-edulink-col">
                                <div class="slider-edulink-item">
                                    <div class="effect-img">
                                        <?= Html::a(Html::img($item->thumb(180, 113)), $item->model->link, ['target' => '_blank']) ?>
                                    </div>
                                    <h3><?= Html::a(Article::shortcut($item->title, 10), $item->model->link, ['target' => '_blank']) ?></h3>
                                </div>
                            </div>
                            <?php endforeach; ?>
                        </div>

                    </div>

                </div>
            </div>
            <!--end category-->
            <?php endif; ?>
			
            <?php if($cate6): ?>
            <div class="category category-color6">
                <div class="category-caption group">
                    <label><?= Html::a($cate6->title, ['articles/cat', 'slug' => $cate6->slug]) ?></label>
                    <ul class="category-submenu">
                        <?php foreach (Article::CateChild($cate6->id) as $child): ?>
                            <li><a href="<?= Url::to(['/articles/cat', 'slug' => $child->slug]) ?>"><?= $child->title ?></a></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
                <div class="category-content">
                    <div class="group">
                        <div class="item-category-large group">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <div class="item-category-50">
                                <div class="effect-img">
                                    <?= Html::a('<div></div>' . Html::img($pack6[0]->thumb(359, 176)), ['articles/view', 'slug' => $pack6[0]->slug]) ?>
                                </div>
                                <h3><?= Html::a($pack6[0]->title , ['articles/view', 'slug' => $pack6[0]->slug]) ?></h3>

                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <div class="item-category-50">
                                <div class="effect-img">
                                    <?= Html::a('<div></div>' . Html::img($pack6[1]->thumb(359, 176)), ['articles/view', 'slug' => $pack6[1]->slug]) ?>
                                </div>
                                <h3><?= Html::a($pack6[1]->title , ['articles/view', 'slug' => $pack6[1]->slug]) ?></h3>

                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <div class="item-category-small">
                                <div class="effect-img">
                                    <?= Html::a(Html::img($pack6[2]->thumb(105, 70)), ['articles/view', 'slug' => $pack6[2]->slug]) ?>
                                </div>
                                <p>
                                     <?= Html::a($pack6[2]->title, ['articles/view', 'slug' => $pack6[2]->slug]) ?>
                                </p>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                             <div class="item-category-small">
                                <div class="effect-img">
                                    <?= Html::a(Html::img($pack6[3]->thumb(105, 70)), ['articles/view', 'slug' => $pack6[3]->slug]) ?>
                                </div>
                                <p>
                                     <?= Html::a($pack6[3]->title, ['articles/view', 'slug' => $pack6[3]->slug]) ?>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--end category-->
            <?php endif; ?>
        </div>
        <div class=" col-lg-3 col-md-4 col-sm-12">
            <!-- LASTEST NEWS -->
            <?= ArticleFeatures::widget(['type' => 'lastest', 'limit' => 10, 'title' => 'TIN MỚI']) ?>
            <div class="fb-page"
                data-href="https://www.facebook.com/Edunet-629418320534078" 
                data-width="300"
                data-hide-cover="false"
                data-show-facepile="true"></div>

            <div class="box">
                <div class="box-caption">
                    <a href="#">THĂM DÒ Ý KIẾN</a>
                </div>
                <div class="box-content">
                    <div class="box-voted">
                        <p>Bạn thấy website này thế nào ?</p>
                        <div class="vote-item">
                            <input type="radio" id="radio01" name="radio" checked />
                            <label for="radio01"><span><em></em></span>Thật tuyệt vời</label>
                        </div>
                        <div class="vote-item">
                            <input type="radio" id="radio02" name="radio" />
                            <label for="radio02">
                                <span>
                                    <em></em>
                                </span>  Tốt
                            </label>
                        </div>
                        <div class="vote-item">
                            <input type="radio" id="radio03" name="radio" />
                            <label for="radio03">
                                <span>
                                    <em></em>
                                </span>  Khá
                            </label>
                        </div>
                        <div class="vote-item">
                            <input type="radio" id="radio04" name="radio" />
                            <label for="radio04">
                                <span>
                                    <em></em>
                                </span>   Trung bình
                            </label>
                        </div>
                        <div class="vote-control">
                            <a href="#" class="btn-vote">Bình chọn</a>
                            <a href="#">XEM KẾT QUẢ</a>
                        </div>
                    </div>
                </div>
            </div>
            <!--end box-->
            <!--
            <div class="box">
                <div class="box-caption">
                    <a href="#">Góc hỏi đáp</a>
                </div>
                <div class="box-content">
                    <ul class="top-qa">
                        <li>
                            <a href="#">

                                Bé nhà mình 4 tuổi có vết chàm tử nhỏ có dung expan được không?
                            </a>
                            <p>Được hỏi bởi <a href="#">Trần Hạo Dân</a></p>
                            <p> <i class="fa fa-clock-o"></i>6 Months Ago <span><i class="fa fa-eye"></i> 675</span></p>
                        </li>
                        <li>
                            <a href="#">

                                Bé nhà mình 4 tuổi có vết chàm tử nhỏ có dung expan được không?
                            </a>
                            <p>Được hỏi bởi <a href="#">Trần Hạo Dân</a></p>
                            <p> <i class="fa fa-clock-o"></i>6 Months Ago <span><i class="fa fa-eye"></i> 675</span></p>
                        </li>
                        <li>
                            <a href="#">

                                Bé nhà mình 4 tuổi có vết chàm tử nhỏ có dung expan được không?
                            </a>
                            <p>Được hỏi bởi <a href="#">Trần Hạo Dân</a></p>
                            <p> <i class="fa fa-clock-o"></i>6 Months Ago <span><i class="fa fa-eye"></i> 675</span></p>
                        </li>
                        <li>
                            <a href="#">

                                Bé nhà mình 4 tuổi có vết chàm tử nhỏ có dung expan được không?
                            </a>
                            <p>Được hỏi bởi <a href="#">Trần Hạo Dân</a></p>
                            <p> <i class="fa fa-clock-o"></i>6 Months Ago <span><i class="fa fa-eye"></i> 675</span></p>
                        </li>
                        <li>
                            <a href="#">

                                Bé nhà mình 4 tuổi có vết chàm tử nhỏ có dung expan được không?
                            </a>
                            <p>Được hỏi bởi <a href="#">Trần Hạo Dân</a></p>
                            <p> <i class="fa fa-clock-o"></i>6 Months Ago <span><i class="fa fa-eye"></i> 675</span></p>
                        </li>
                        <li>
                            <a href="#">

                                Bé nhà mình 4 tuổi có vết chàm tử nhỏ có dung expan được không?
                            </a>
                            <p>Được hỏi bởi <a href="#">Trần Hạo Dân</a></p>
                            <p> <i class="fa fa-clock-o"></i>6 Months Ago <span><i class="fa fa-eye"></i> 675</span></p>
                        </li>
                        <li>
                            <a href="#">

                                Bé nhà mình 4 tuổi có vết chàm tử nhỏ có dung expan được không?
                            </a>
                            <p>Được hỏi bởi <a href="#">Trần Hạo Dân</a></p>
                            <p> <i class="fa fa-clock-o"></i>6 Months Ago <span><i class="fa fa-eye"></i> 675</span></p>
                        </li>
                        <li>
                            <a href="#">

                                Bé nhà mình 4 tuổi có vết chàm tử nhỏ có dung expan được không?
                            </a>
                            <p>Được hỏi bởi <a href="#">Trần Hạo Dân</a></p>
                            <p> <i class="fa fa-clock-o"></i>6 Months Ago <span><i class="fa fa-eye"></i> 675</span></p>
                        </li>
                        <li>
                            <a href="#">

                                Bé nhà mình 4 tuổi có vết chàm tử nhỏ có dung expan được không?
                            </a>
                            <p>Được hỏi bởi <a href="#">Trần Hạo Dân</a></p>
                            <p> <i class="fa fa-clock-o"></i>6 Months Ago <span><i class="fa fa-eye"></i> 675</span></p>
                        </li>
                        <li>
                            <a href="#">

                                Bé nhà mình 4 tuổi có vết chàm tử nhỏ có dung expan được không?
                            </a>
                            <p>Được hỏi bởi <a href="#">Trần Hạo Dân</a></p>
                            <p> <i class="fa fa-clock-o"></i>6 Months Ago <span><i class="fa fa-eye"></i> 675</span></p>
                        </li>
                        <li>
                            <a href="#">

                                Bé nhà mình 4 tuổi có vết chàm tử nhỏ có dung expan được không?
                            </a>
                            <p>Được hỏi bởi <a href="#">Trần Hạo Dân</a></p>
                            <p> <i class="fa fa-clock-o"></i>6 Months Ago <span><i class="fa fa-eye"></i> 675</span></p>
                        </li>
                        <li>
                            <a href="#">

                                Bé nhà mình 4 tuổi có vết chàm tử nhỏ có dung expan được không?
                            </a>
                            <p>Được hỏi bởi <a href="#">Trần Hạo Dân</a></p>
                            <p> <i class="fa fa-clock-o"></i>6 Months Ago <span><i class="fa fa-eye"></i> 675</span></p>
                        </li>
                        <li>
                            <a href="#">

                                Bé nhà mình 4 tuổi có vết chàm tử nhỏ có dung expan được không?
                            </a>
                            <p>Được hỏi bởi <a href="#">Trần Hạo Dân</a></p>
                            <p> <i class="fa fa-clock-o"></i>6 Months Ago <span><i class="fa fa-eye"></i> 675</span></p>
                        </li>
                        <li>
                            <a href="#">

                                Bé nhà mình 4 tuổi có vết chàm tử nhỏ có dung expan được không?
                            </a>
                            <p>Được hỏi bởi <a href="#">Trần Hạo Dân</a></p>
                            <p> <i class="fa fa-clock-o"></i>6 Months Ago <span><i class="fa fa-eye"></i> 675</span></p>
                        </li>
                        <li>
                            <a href="#">

                                Bé nhà mình 4 tuổi có vết chàm tử nhỏ có dung expan được không?
                            </a>
                            <p>Được hỏi bởi <a href="#">Trần Hạo Dân</a></p>
                            <p> <i class="fa fa-clock-o"></i>6 Months Ago <span><i class="fa fa-eye"></i> 675</span></p>
                        </li>

                    </ul>
                </div>
            </div>-->
            <!--end box-->
            <?php if ($sideAds1 = Carousel::byKey('side_ads_1')): ?>
                <div class="ads5 hidden-sm hidden-xs">
                    <a href="<?= $sideAds1->link ?>" title="<?= $sideAds1->title ?>">
                        <?= Html::img($sideAds1->thumb(300), ['alt' => $sideAds1->title]) ?>
                    </a>
                </div>
            <?php endif; ?>
            <?php if ($sideAds2 = Carousel::byKey('side_ads_2')): ?>
                <div class="ads5 hidden-sm hidden-xs">
                    <a href="<?= $sideAds2->link ?>" title="<?= $sideAds2->title ?>">
                        <?= Html::img($sideAds2->thumb(300), ['alt' => $sideAds2->title]) ?>
                    </a>
                </div>
            <?php endif; ?>
            <?php if ($sideAds3 = Carousel::byKey('side_ads_3')): ?>
                <div class="ads5 hidden-sm hidden-xs">
                    <a href="<?= $sideAds3->link ?>" title="<?= $sideAds3->title ?>">
                        <?= Html::img($sideAds3->thumb(300), ['alt' => $sideAds3->title]) ?>
                    </a>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>

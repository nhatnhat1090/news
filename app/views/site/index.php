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
$pack1 = $cate1->items(['pagination' => ['pageSize' => 3]]);

//Du học
$cate2 = Article::cat(5);
$pack2 = $cate2->items(['pagination' => ['pageSize' => 4]]);

//Nhìn ra thế giới
$cate3 = Article::cat(2);
$pack3 = $cate3->items(['pagination' => ['pageSize' => 4]]);

//Edulink
$cate4 = Article::cat(17);
$pack4 = $cate4->items(['pagination' => ['pageSize' => 4]]);

//Góc VTV7
$cate5 = Article::cat(14);
$pack5 = $cate5->items(['pagination' => ['pageSize' => 4]]);
?>
<div class="gb-view-container">
    <div class="home-news-line">
        <a href="#" title="" class="home-news-line__header">Dòng sự kiện</a>
        <div class="home-news-line__text">
            Trường đại học sẽ không được đào tạo trình độ cao đẳng - ‘Hội nghị Diên Hồng’ trước nguy cơ môn Lịch sử bị xoá sổ
        </div>
    </div>
    <?php if (count($headnews) == 4): ?>
    <div class="container-fluid">
        <div class="row top-event__container">
            <div class="top-event__navigation-container__tablet">
                <a href="#" title="" class="top-event__navigation-pre">&nbsp;</a>
                <a href="#" title="" class="top-event__navigation-next">&nbsp;</a>
            </div>
            <div class="top-event__event-list">
                <div class="col-xs-12 col-md-6 top-event__event-column">
                    <div class="top-event__event top-event__event-full">
                        <a href="<?= Url::to(['articles/view', 'slug' => $headnews[0]->slug]); ?>" title="">
                            <?= Html::img($headnews[0]->thumb(546, 462)) ?>
                            <div class="top-event__event-text">
                                <h4><?= $headnews[0]->cat->title ?></h4>
                                <h2><?= $headnews[0]->title ?></h2>
                                <span><?= date('d/m/Y', $headnews[0]->time) ?></span>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-xs-12 col-md-6 top-event__event-column">
                    <div class="top-event__event top-event__event-half-vertical">
                        <a href="<?= Url::to(['articles/view', 'slug' => $headnews[1]->slug]); ?>" title="">
                            <?= Html::img($headnews[1]->thumb(547, 259)) ?>
                            <div class="top-event__event-text">
                                <h4><?= $headnews[1]->cat->title ?></h4>
                                <h2><?= $headnews[1]->title ?></h2>
                                <span></span>
                            </div>
                        </a>
                    </div>
                    <div>
                        <div class="col-xs-12 col-sm-6 top-event__event-column">
                            <div class="top-event__event top-event__event-half-vertical-horizontal">
                                <a href="<?= Url::to(['articles/view', 'slug' => $headnews[2]->slug]); ?>" title="">
                                    <?= Html::img($headnews[2]->thumb(270, 198)) ?>
                                    <div class="top-event__event-text">
                                        <h4><?= $headnews[2]->cat->title ?></h4>
                                        <h2><?= $headnews[2]->title ?></h2>
                                        <span></span>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 top-event__event-column">
                            <div class="top-event__event top-event__event-half-vertical-horizontal">
                                <a href="<?= Url::to(['articles/view', 'slug' => $headnews[3]->slug]); ?>" title="">
                                    <?= Html::img($headnews[3]->thumb(270, 198)) ?>
                                    <div class="top-event__event-text">
                                        <h4><?= $headnews[3]->cat->title ?></h4>
                                        <h2><?= $headnews[3]->title ?></h2>
                                        <span></span>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php endif; ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-12 col-md-8 gb-column gb-column__big">
                <!-- Begin Đổi mới giáo dục -->
                <div class="news-group">
                    <div class="news-group__header news-group__header__orange-border">
                        <h2><?= $cate1->title ?></h2>
                        <div class="news-group__header__buttons-container">
                            <a class="button-item button-item__view-all" href="<?= Url::to(['/articles/cat', 'slug' => $cate1->slug]) ?>" title="">Xem toàn bộ </a>
                        </div>
                    </div>
                    <div class="news-group__content">
                        <div class="home-news-item__container home-news-item__container__full">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-xs-12 col-sm-6">
                                        <?= Html::a(Html::img($pack1[0]->thumb(359, 176)), ['articles/view', 'slug' => $pack1[0]->slug]) ?>
                                    </div>
                                    <div class="col-xs-12 col-sm-6">
                                        <?= Html::a('<strong>' . $pack1[0]->title . '</strong>', ['articles/view', 'slug' => $pack1[0]->slug]) ?>
                                        <span><?= date('d/m/Y', $pack1[0]->time) ?></span>
                                        <p>
                                            <?= $pack1[0]->short; ?>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php if (count($pack1) > 1): ?>
                        <div class="news-group__container__small">
                            <div class="container-fluid">
                                <div class="row">
                                    <a href="<?= Url::to(['articles/view', 'slug' => $pack1[1]->slug]); ?>" title="" class="home-news-item__container home-news-item__item__small col-xs-12 col-sm-6">
                                        <div class="col-xs-4">
                                            <?= Html::img($pack1[1]->thumb(105, 70)) ?>
                                        </div>
                                        <div class="col-xs-8">
                                            <strong><?= $pack1[1]->title ?></strong>
                                        </div>
                                    </a>
                                    <?php if (isset($pack1[2])):  ?>
                                    <a href="<?= Url::to(['articles/view', 'slug' => $pack1[2]->slug]); ?>" title="" class="home-news-item__container home-news-item__item__small col-xs-12 col-sm-6">
                                        <div class="col-xs-4">
                                            <?= Html::img($pack1[2]->thumb(105, 70)) ?>
                                        </div>
                                        <div class="col-xs-8">
                                            <strong><?= $pack1[2]->title ?></strong>
                                        </div>
                                    </a>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
                <!-- End Đổi mới giáo dục -->
                <?php if ($bodyAds1 = Carousel::byKey('body_ads_1')): ?>
                    <div class="ads-container">
                        <a href="<?= $bodyAds1->link ?>" title="">
                            <?= Html::img($bodyAds1->thumb(728), ['alt' => $bodyAds1->title]) ?>
                        </a>
                    </div>
                <?php endif; ?>
                <div class="news-group">
                    <div class="news-group__header news-group__header__green-border">
                        <h2><?= $cate2->title ?></h2>
                        <div class="news-group__header__buttons-container">
                            <?php foreach (Article::CateChild($cate2->id) as $child): ?>
                                <a class="button-item button-item__normal" href="<?= Url::to(['/articles/cat', 'slug' => $child->slug]) ?>" title=""><?= $child->title ?></a>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    <div class="news-group__content">
                        <div class="news-group__container__half-big">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="home-news-item__container col-xs-12 col-sm-6">
                                        <?= Html::a(Html::img($pack2[0]->thumb(359, 176)), ['articles/view', 'slug' => $pack2[0]->slug]) ?>
                                        <h3><strong><?= $pack2[0]->title ?></strong></h3>
                                        <span><?= date('d/m/Y', $pack2[0]->time) ?></span>
                                    </div>
                                    <div class="home-news-item__container col-xs-12 col-sm-6">
                                         <?= Html::a(Html::img($pack2[1]->thumb(359, 176)), ['articles/view', 'slug' => $pack2[1]->slug]) ?>
                                        <h3><strong><?= $pack2[1]->title ?></strong></h3>
                                        <span><?= date('d/m/Y', $pack2[1]->time) ?></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="news-group__container__small">
                            <div class="container-fluid">
                                <div class="row">
                                    <a href="<?= Url::to(['articles/view', 'slug' => $pack2[2]->slug]); ?>" title="" class="home-news-item__container home-news-item__item__small col-xs-12 col-sm-6">
                                        <div class="col-xs-4">
                                            <?= Html::img($pack2[2]->thumb(105, 70)) ?>
                                        </div>
                                        <div class="col-xs-8">
                                            <strong><?= $pack2[2]->title ?></strong>
                                        </div>
                                    </a>
                                    <a href="<?= Url::to(['articles/view', 'slug' => $pack2[3]->slug]); ?>" title="" class="home-news-item__container home-news-item__item__small col-xs-12 col-sm-6">
                                        <div class="col-xs-4">
                                            <?= Html::img($pack2[3]->thumb(105, 70)) ?>
                                        </div>
                                        <div class="col-xs-8">
                                            <strong><?= $pack2[3]->title ?></strong>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php if ($bodyAds2 = Carousel::byKey('body_ads_2')): ?>
                    <div class="ads-container">
                        <a href="<?= $bodyAds2->link ?>" title="">
                            <?= Html::img($bodyAds2->thumb(728), ['alt' => $bodyAds2->title]) ?>
                        </a>
                    </div>
                <?php endif; ?>
                <div class="news-group">
                    <div class="news-group__header news-group__header__red-border">
                        <h2><?= $cate3->title ?></h2>
                        <div class="news-group__header__buttons-container">
                            <a class="button-item button-item__view-all" href="<?= Url::to(['/articles/cat', 'slug' => $cate3->slug]) ?>" title="">Xem toàn bộ </a>
                        </div>
                    </div>
                    <div class="news-group__content">
                        <div class="news-group__container__half-medium">
                            <div class="container-fluid">
                                <div class="row">
                                    <?php foreach ($pack3 as $item): ?>
                                        <div class="home-news-item__container col-xs-12 col-sm-6">
                                            <div class="col-xs-6">
                                                 <?= Html::a(Html::img($item->thumb(165, 110)), ['articles/view', 'slug' => $item->slug]) ?>
                                            </div>
                                            <div class="col-xs-6">
                                                <h4><strong><?= $item->title ?></strong></h4>
                                                <span><?= date('d/m/Y', $item->time) ?></span>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="news-group">
                    <div class="news-group__header news-group__header__green-border">
                        <h2><?= $cate4->title ?></h2>
                        <div class="news-group__header__buttons-container">
                            <a class="button-item button-item__view-all" href="<?= Url::to(['/articles/cat', 'slug' => $cate4->slug]) ?>" title="">Xem toàn bộ </a>
                        </div>
                    </div>
                    <div class="news-group__content">
                        <div class="news-group__container__four-column">
                            <div class="container-fluid">
                                <div class="row">
                                    <?php foreach ($pack4 as $item): ?>
                                        <a href="<?= Url::to(['articles/view', 'slug' => $item->slug]); ?>" title="" class="home-news-item__container col-xs-6 col-sm-3">
                                            <?= Html::img($item->thumb(180, 113)) ?>
                                            <span><strong><?= $item->title ?></strong></span>
                                        </a>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="news-group">
                    <div class="news-group__header news-group__header__blue-border">
                        <h2><?= $cate5->title ?></h2>
                        <div class="news-group__header__buttons-container">
                            <a class="button-item button-item__view-all" href="<?= Url::to(['/articles/cat', 'slug' => $cate5->slug]) ?>" title="">Xem toàn bộ </a>
                        </div>
                    </div>
                    <div class="news-group__content">
                        <div class="news-group__container__half-medium">
                            <div class="container-fluid">
                                <div class="row">
                                    <?php foreach($pack5 as $item): ?>
                                    <div class="home-news-item__container col-xs-12 col-sm-6">
                                        <div class="col-xs-6">
                                            <?= Html::a(Html::img($item->thumb(165, 110)), ['articles/view', 'slug' => $item->slug]) ?>
                                        </div>
                                        <div class="col-xs-6">
                                            <h4><strong><?= $item->title ?></strong></h4>
                                            <span><?= date('d/m/Y', $item->time) ?></span>
                                        </div>
                                    </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-md-4 gb-column gb-column__small">
                <?= ArticleFeatures::widget(['type' => 'lastest', 'limit' => 5, 'title' => 'Tin mới']) ?>
                <div class="top-news__container col-xs-12 col-sm-6 col-md-12">
                    <div class="top-news__header-group top-news__header-group__green">
                        <h2>Thăm dò ý kiến</h2>
                    </div>
                    <div class="question__question-title">
                        Bạn thấy website này như thế nào ?
                    </div>
                    <div class="question__question-answer-container">
                        <form action="">
                            <span class="question__question-answer-item">
                                <input id="answer1" class="question__question-answer-item__radio-option" type="radio" name="answer" value="1"/>
                                <label for="answer1" class="question__question-answer-item__radio-label">Thật tuyệt vời</label>
                            </span>
                            <span class="question__question-answer-item">
                                <input id="answer2" class="question__question-answer-item__radio-option" type="radio" name="answer" value="2"/>
                                <label for="answer2" class="question__question-answer-item__radio-label">Tốt</label>
                            </span>
                            <span class="question__question-answer-item">
                                <input id="answer3" class="question__question-answer-item__radio-option" type="radio" name="answer" value="3"/>
                                <label for="answer3" class="question__question-answer-item__radio-label">Khá</label>
                            </span>
                            <span class="question__question-answer-item">
                                <input id="answer4" class="question__question-answer-item__radio-option" type="radio" name="answer" value="4"/>
                                <label for="answer4" class="question__question-answer-item__radio-label">Trung bình</label>
                            </span>
                            <div class="question__submit-container">
                                <button type="submit" class="question__submit-button">Bình chọn</button>
                                <a href="#" title="" class="question__submit-link">Xem kết quả</a>
                            </div>
                        </form>
                    </div>
                </div>
<!--                <div class="top-news__container col-xs-12 col-sm-6 col-md-12">
                    <div class="top-news__header-group top-news__header-group__blue">
                        <h2>Góc hỏi đáp</h2>
                    </div>
                    <div class="client-ask__list">
                        <div class="client-ask__item">
                            <div class="client-ask__question">
                                Những kiến thức gì cần trang bị khi đi du học?
                            </div>
                            <div class="client-ask__author">
                                <span class="client-ask__author-label">Được đăng bởi</span>
                                <span class="client-ask__author-name">Trần Hạo Dân</span>
                            </div>
                            <div class="client-ask__social">
                                <span class="client-ask__social-date">1 tháng trước</span>
                                <span class="client-ask__social-seen">103</span>
                            </div>
                        </div>
                        <div class="client-ask__item">
                            <div class="client-ask__question">
                                Những trường đại học nào học MBA tốt nhất?
                            </div>
                            <div class="client-ask__author">
                                <span class="client-ask__author-label">Được đăng bởi</span>
                                <span class="client-ask__author-name">Lee Nhật</span>
                            </div>
                            <div class="client-ask__social">
                                <span class="client-ask__social-date">2 tháng trước</span>
                                <span class="client-ask__social-seen">89</span>
                            </div>
                        </div>
                        <div class="client-ask__item">
                            <div class="client-ask__question">
                                Làm thế nào để quyên góp cho hội khuyến học?
                            </div>
                            <div class="client-ask__author">
                                <span class="client-ask__author-label">Được đăng bởi</span>
                                <span class="client-ask__author-name">Lê Anh Tùng</span>
                            </div>
                            <div class="client-ask__social">
                                <span class="client-ask__social-date">3 tháng trước</span>
                                <span class="client-ask__social-seen">68</span>
                            </div>
                        </div>
                    </div>
                </div>-->
                <?php if ($sideAds1 = Carousel::byKey('side_ads_1')): ?>
                    <div class="side-ads__container col-xs-12 col-sm-6 col-md-12">
                        <a href="<?= $sideAds1->link ?>" title="<?= $sideAds1->title ?>">
                            <?= Html::img($sideAds1->thumb(300), ['alt' => $sideAds1->title]) ?>
                        </a>
                    </div>
                <?php endif; ?>
                <?php if ($sideAds2 = Carousel::byKey('side_ads_2')): ?>
                    <div class="side-ads__container col-xs-12 col-sm-6 col-md-12">
                        <a href="<?= $sideAds2->link ?>" title="<?= $sideAds2->title ?>">
                            <?= Html::img($sideAds2->thumb(300), ['alt' => $sideAds2->title]) ?>
                        </a>
                    </div>
                <?php endif; ?>
                <?php if ($sideAds3 = Carousel::byKey('side_ads_3')): ?>
                    <div class="side-ads__container col-xs-12 col-sm-6 col-md-12">
                        <a href="<?= $sideAds3->link ?>" title="<?= $sideAds3->title ?>">
                            <?= Html::img($sideAds3->thumb(300), ['alt' => $sideAds3->title]) ?>
                        </a>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
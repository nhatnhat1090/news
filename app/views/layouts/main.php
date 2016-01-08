<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\easyii\widgets\ArticleFeatures;
use yii\easyii\modules\carousel\api\Carousel;

$asset = \app\assets\FrontAsset::register($this);
?>
<?php $this->beginContent('@app/views/layouts/base.php'); ?>
<div class="gb-view-container">
    <div class="container-fluid">
        <div class="row">
            <?= $content ?>
            <div class="col-xs-12 col-md-4 gb-column gb-column__small">
                <?= ArticleFeatures::widget(['type' => 'lastest', 'limit' => 5, 'title' => 'Tin mới']) ?>

                <div class="top-news__container col-xs-12 col-sm-6 col-md-12">
                    <div class="top-news__header-group top-news__header-group__green">
                        <h2>Thăm dò ý kiến</h2>
                    </div>
                    <div class="question__question-title">Bạn thấy website này như thế nào ?</div>
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
<?php $this->endContent(); ?>

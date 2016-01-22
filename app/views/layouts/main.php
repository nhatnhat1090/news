<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\easyii\widgets\ArticleFeatures;
use yii\easyii\modules\carousel\api\Carousel;

$asset = \app\assets\FrontAsset::register($this);
?>
<?php $this->beginContent('@app/views/layouts/base.php'); ?>
<div class="cols">
    <div class="row">
        <div class=" col-lg-9 col-md-8 col-sm-12">
            <?= $content ?>
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
<?php $this->endContent(); ?>

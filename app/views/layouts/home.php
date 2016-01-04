<?php
//use yii\easyii\modules\shopcart\api\Shopcart;
//use yii\easyii\modules\subscribe\api\Subscribe;
//use yii\helpers\Url;
//use yii\widgets\Breadcrumbs;
//use yii\widgets\Menu;
//
//$goodsCount = count(Shopcart::goods());
$asset = \app\assets\FrontAsset::register($this);
?>
<?php $this->beginContent('@app/views/layouts/base.php'); ?>
<div class="gb-view-container">
    <div class="home-news-line">
        <a href="#" title="" class="home-news-line__header">Dòng sự kiện</a>
        <div class="home-news-line__text">
            Trường đại học sẽ không được đào tạo trình độ cao đẳng - ‘Hội nghị Diên Hồng’ trước nguy cơ môn Lịch sử bị xoá sổ
        </div>
    </div>
    <div class="container-fluid">
        <div class="row top-event__container">
            <div class="top-event__navigation-container__tablet">
                <a href="#" title="" class="top-event__navigation-pre">&nbsp;</a>
                <a href="#" title="" class="top-event__navigation-next">&nbsp;</a>
            </div>
            <div class="top-event__event-list">
                <div class="col-xs-12 col-md-6 top-event__event-column">
                    <div class="top-event__event top-event__event-full">
                        <a href="#" title="">
                            <img src="<?= $asset->baseUrl ?>/img/event1.png" alt=""/>
                            <div class="top-event__event-text">
                                <h4>Giáo dục đổi mới</h4>
                                <h2>Trường đại học sẽ không được đào tạo trình độ cao đẳng - &#x27;Hội nghị Diên Hồng&#x27; trước nguy cơ ...</h2>
                                <span>Thứ 4, 30/12/2015</span>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-xs-12 col-md-6 top-event__event-column">
                    <div class="top-event__event top-event__event-half-vertical">
                        <a href="#" title="">
                            <img src="<?= $asset->baseUrl ?>/img/event2.png" alt=""/>
                            <div class="top-event__event-text">
                                <h4>Nhìn ra thế giới</h4>
                                <h2>Sự hợp tác mới của Đại học Monash và cơ hội cho sinh viên</h2>
                                <span></span>
                            </div>
                        </a>
                    </div>
                    <div>
                        <div class="col-xs-12 col-sm-6 top-event__event-column">
                            <div class="top-event__event top-event__event-half-vertical-horizontal">
                                <a href="#" title="">
                                    <img src="<?= $asset->baseUrl ?>/img/event3.png" alt=""/>
                                    <div class="top-event__event-text">
                                        <h4>Du học</h4>
                                        <h2>Bí quyết xóa tan nỗi ám ảnh mang tên &quot;jetlag&quot;</h2>
                                        <span></span>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 top-event__event-column">
                            <div class="top-event__event top-event__event-half-vertical-horizontal">
                                <a href="#" title="">
                                    <img src="<?= $asset->baseUrl ?>/img/event4.png" alt=""/>
                                    <div class="top-event__event-text">
                                        <h4>Góc VTV7</h4>
                                        <h2>Cô giáo vùng cao vỡ òa hạnh phúc nhận quà</h2>
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
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-12 col-md-8 gb-column gb-column__big">
                <div class="news-group">
                    <div class="news-group__header news-group__header__orange-border">
                        <h2>
                            Đổi mới giáo dục </h2>
                        <div class="news-group__header__buttons-container">
                            <a class="button-item button-item__view-all" href="#" title="">
                                Xem toàn bộ </a>
                        </div>
                    </div>
                    <div class="news-group__content">
                        <div class="home-news-item__container home-news-item__container__full">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-xs-12 col-sm-6">
                                        <a href="#" title="">
                                            <img src="<?= $asset->baseUrl ?>/img/news_full.png" alt=""/>
                                        </a>
                                    </div>
                                    <div class="col-xs-12 col-sm-6">
                                        <a href="#" title="">
                                            Triển lãm du học THPT nội trú lớn nhất hàng năm của AMVNX </a>
                                        <span>Thứ tư, 30/12/2015</span>
                                        <p>
                                            Đến với Triển lãm THPT Nội trú Mỹ AMVNX 2015, các em sẽ tìm được rất nhiều thông tin bổ ích về cơ hội học tập tại các quốc gia có nền giáo dục hàng đầu thế giới.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="news-group__container__small">
                            <div class="container-fluid">
                                <div class="row">
                                    <a href="#" title="" class="home-news-item__container home-news-item__item__small col-xs-12 col-sm-6">
                                        <div class="col-xs-4">
                                            <img src="<?= $asset->baseUrl ?>/img/news_small_one.png" alt=""/>
                                        </div>
                                        <div class="col-xs-8">
                                            Lời khuyên cho sinh viên đang chán ngành học
                                        </div>
                                    </a>
                                    <a href="#" title="" class="home-news-item__container home-news-item__item__small col-xs-12 col-sm-6">
                                        <div class="col-xs-4">
                                            <img src="<?= $asset->baseUrl ?>/img/news_small_two.png" alt=""/>
                                        </div>
                                        <div class="col-xs-8">
                                            Cái Tết an lành của du học sinh Việt trên đất Nga
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="ads-container">
                    <a href="#" title="">
                        <img src="<?= $asset->baseUrl ?>/img/body_ads.png" alt=""/>
                    </a>
                </div>
                <div class="news-group">
                    <div class="news-group__header news-group__header__green-border">
                        <h2>
                            Du học </h2>
                        <div class="news-group__header__buttons-container">
                            <a class="button-item button-item__normal" href="#" title="">
                                Tuyển sinh </a>
                            <a class="button-item button-item__normal" href="#" title="">
                                Tư vấn du học </a>
                            <a class="button-item button-item__normal" href="#" title="">
                                Chuyện của du học sinh </a>
                        </div>
                    </div>
                    <div class="news-group__content">
                        <div class="news-group__container__half-big">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="home-news-item__container col-xs-12 col-sm-6">
                                        <a href="#" title="">
                                            <img src="<?= $asset->baseUrl ?>/img/new_half_big.png" alt=""/>
                                        </a>
                                        <h3>Hướng đi của học sinh, sinh viên Mỹ khác Việt Nam ra sao</h3>
                                        <span>Thứ tư, 30/12/2015</span>
                                    </div>
                                    <div class="home-news-item__container col-xs-12 col-sm-6">
                                        <a href="#" title="">
                                            <img src="<?= $asset->baseUrl ?>/img/new_half_big2.png" alt=""/>
                                        </a>
                                        <h3>Hướng đi của học sinh, sinh viên Mỹ khác Việt Nam ra sao</h3>
                                        <span>Thứ tư, 30/12/2015</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="news-group__container__small">
                            <div class="container-fluid">
                                <div class="row">
                                    <a href="#" title="" class="home-news-item__container home-news-item__item__small col-xs-12 col-sm-6">
                                        <div class="col-xs-4">
                                            <img src="<?= $asset->baseUrl ?>/img/news_small_one.png" alt=""/>
                                        </div>
                                        <div class="col-xs-8">
                                            Lời khuyên cho sinh viên đang chán ngành học
                                        </div>
                                    </a>
                                    <a href="#" title="" class="home-news-item__container home-news-item__item__small col-xs-12 col-sm-6">
                                        <div class="col-xs-4">
                                            <img src="<?= $asset->baseUrl ?>/img/news_small_two.png" alt=""/>
                                        </div>
                                        <div class="col-xs-8">
                                            Cái Tết an lành của du học sinh Việt trên đất Nga
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="ads-container">
                    <a href="#" title="">
                        <img src="<?= $asset->baseUrl ?>/img/body_ads2.png" alt=""/>
                    </a>
                </div>
                <div class="news-group">
                    <div class="news-group__header news-group__header__red-border">
                        <h2>
                            Nhìn ra thế giới </h2>
                        <div class="news-group__header__buttons-container">
                            <a class="button-item button-item__view-all" href="#" title="">
                                Xem toàn bộ </a>
                        </div>
                    </div>
                    <div class="news-group__content">
                        <div class="news-group__container__half-medium">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="home-news-item__container col-xs-12 col-sm-6">
                                        <div class="col-xs-6">
                                            <a href="#" title="">
                                                <img src="<?= $asset->baseUrl ?>/img/news_medium1.png" alt=""/>
                                            </a>
                                        </div>
                                        <div class="col-xs-6">
                                            <h4>Hướng đi của học sinh, sinh viên Mỹ khác Việt Nam ra sao</h4>
                                            <span>Thứ tư, 30/12/2015</span>
                                        </div>
                                    </div>
                                    <div class="home-news-item__container col-xs-12 col-sm-6">
                                        <div class="col-xs-6">
                                            <a href="#" title="">
                                                <img src="<?= $asset->baseUrl ?>/img/news_medium2.png" alt=""/>
                                            </a>
                                        </div>
                                        <div class="col-xs-6">
                                            <h4>Hướng đi của học sinh, sinh viên Mỹ khác Việt Nam ra sao</h4>
                                            <span>Thứ tư, 30/12/2015</span>
                                        </div>
                                    </div>
                                    <div class="home-news-item__container col-xs-12 col-sm-6">
                                        <div class="col-xs-6">
                                            <a href="#" title="">
                                                <img src="<?= $asset->baseUrl ?>/img/news_medium3.png" alt=""/>
                                            </a>
                                        </div>
                                        <div class="col-xs-6">
                                            <h4>Hướng đi của học sinh, sinh viên Mỹ khác Việt Nam ra sao</h4>
                                            <span>Thứ tư, 30/12/2015</span>
                                        </div>
                                    </div>
                                    <div class="home-news-item__container col-xs-12 col-sm-6">
                                        <div class="col-xs-6">
                                            <a href="#" title="">
                                                <img src="<?= $asset->baseUrl ?>/img/news_medium4.png" alt=""/>
                                            </a>
                                        </div>
                                        <div class="col-xs-6">
                                            <h4>Hướng đi của học sinh, sinh viên Mỹ khác Việt Nam ra sao</h4>
                                            <span>Thứ tư, 30/12/2015</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="news-group">
                    <div class="news-group__header news-group__header__green-border">
                        <h2>Edu_Link</h2>
                        <div class="news-group__header__buttons-container">
                            <a class="button-item button-item__view-all" href="#" title="">
                                Xem toàn bộ </a>
                        </div>
                    </div>
                    <div class="news-group__content">
                        <div class="news-group__container__four-column">
                            <div class="container-fluid">
                                <div class="row">
                                    <a href="#" title="" class="home-news-item__container col-xs-6 col-sm-3">
                                        <img src="<?= $asset->baseUrl ?>/img/news_education1.png" alt=""/>
                                        <span>Hội trợ Giáng Sinh của học sinh trường Lômônôxốp</span>
                                    </a>
                                    <a href="#" title="" class="home-news-item__container col-xs-6 col-sm-3">
                                        <img src="<?= $asset->baseUrl ?>/img/news_education2.png" alt=""/>
                                        <span>Văn hóa Mỹ - không phải &quot;du học sinh&quot; nào cũng đối mặt được</span>
                                    </a>
                                    <a href="#" title="" class="home-news-item__container col-xs-6 col-sm-3">
                                        <img src="<?= $asset->baseUrl ?>/img/news_education3.png" alt=""/>
                                        <span>7 điều tuyệt vời khi học trong một lớp học &quot;thiếu nam&quot;</span>
                                    </a>
                                    <a href="#" title="" class="home-news-item__container col-xs-6 col-sm-3">
                                        <img src="<?= $asset->baseUrl ?>/img/news_education4.png" alt=""/>
                                        <span>Hướng đi của học sinh, sinh viên Mỹ khác Việt Nam ra sao</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="news-group">
                    <div class="news-group__header news-group__header__blue-border">
                        <h2>Góc VTV7</h2>
                        <div class="news-group__header__buttons-container">
                            <a class="button-item button-item__view-all" href="#" title="">
                                Xem toàn bộ </a>
                        </div>
                    </div>
                    <div class="news-group__content">
                        <div class="news-group__container__half-medium">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="home-news-item__container col-xs-12 col-sm-6">
                                        <div class="col-xs-6">
                                            <a href="#" title="">
                                                <img src="<?= $asset->baseUrl ?>/img/news_medium1.png" alt=""/>
                                            </a>
                                        </div>
                                        <div class="col-xs-6">
                                            <h4>Hướng đi của học sinh, sinh viên Mỹ khác Việt Nam ra sao</h4>
                                            <span>Thứ tư, 30/12/2015</span>
                                        </div>
                                    </div>
                                    <div class="home-news-item__container col-xs-12 col-sm-6">
                                        <div class="col-xs-6">
                                            <a href="#" title="">
                                                <img src="<?= $asset->baseUrl ?>/img/news_medium2.png" alt=""/>
                                            </a>
                                        </div>
                                        <div class="col-xs-6">
                                            <h4>Hướng đi của học sinh, sinh viên Mỹ khác Việt Nam ra sao</h4>
                                            <span>Thứ tư, 30/12/2015</span>
                                        </div>
                                    </div>
                                    <div class="home-news-item__container col-xs-12 col-sm-6">
                                        <div class="col-xs-6">
                                            <a href="#" title="">
                                                <img src="<?= $asset->baseUrl ?>/img/news_medium3.png" alt=""/>
                                            </a>
                                        </div>
                                        <div class="col-xs-6">
                                            <h4>Hướng đi của học sinh, sinh viên Mỹ khác Việt Nam ra sao</h4>
                                            <span>Thứ tư, 30/12/2015</span>
                                        </div>
                                    </div>
                                    <div class="home-news-item__container col-xs-12 col-sm-6">
                                        <div class="col-xs-6">
                                            <a href="#" title="">
                                                <img src="<?= $asset->baseUrl ?>/img/news_medium4.png" alt=""/>
                                            </a>
                                        </div>
                                        <div class="col-xs-6">
                                            <h4>Hướng đi của học sinh, sinh viên Mỹ khác Việt Nam ra sao</h4>
                                            <span>Thứ tư, 30/12/2015</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-md-4 gb-column gb-column__small">
                <div class="top-news__container col-xs-12 col-sm-6 col-md-12">
                    <div class="top-news__header-group top-news__header-group__orange">
                        <h2>Tin mới</h2>
                    </div>
                    <div class="top-news__list">
                        <a class="top-news__item" href="#">
                            <div class="col-xs-25 top-news__item-img">
                                <img src="<?= $asset->baseUrl ?>/img/news_medium1.png" alt=""/>
                            </div>
                            <div class="col-xs-35 top-news__item-text">
                                Học bổng hấp dẫn từ các trường của Mỹ, Canada
                            </div>
                        </a>
                        <a class="top-news__item" href="#">
                            <div class="col-xs-25 top-news__item-img">
                                <img src="<?= $asset->baseUrl ?>/img/news_medium2.png" alt=""/>
                            </div>
                            <div class="col-xs-35 top-news__item-text">
                                Hướng đi của học sinh, sinh viên Mỹ khác Việt Nam ra sao
                            </div>
                        </a>
                        <a class="top-news__item" href="#">
                            <div class="col-xs-25 top-news__item-img">
                                <img src="<?= $asset->baseUrl ?>/img/news_medium3.png" alt=""/>
                            </div>
                            <div class="col-xs-35 top-news__item-text">
                                Người Phần Lan nghĩ gì về du học sinh Việt Nam?
                            </div>
                        </a>
                        <a class="top-news__item" href="#">
                            <div class="col-xs-25 top-news__item-img">
                                <img src="<?= $asset->baseUrl ?>/img/news_medium4.png" alt=""/>
                            </div>
                            <div class="col-xs-35 top-news__item-text">
                                Hướng đi của học sinh, sinh viên Mỹ khác Việt Nam ra sao
                            </div>
                        </a>
                        <a class="top-news__item" href="#">
                            <div class="col-xs-25 top-news__item-img">
                                <img src="<?= $asset->baseUrl ?>/img/top-news-five.png" alt=""/>
                            </div>
                            <div class="col-xs-35 top-news__item-text">
                                Đại học Manchester - ngôi trường mơ ước của nhiều học sinh
                            </div>
                        </a>
                    </div>
                </div>
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
                <div class="top-news__container col-xs-12 col-sm-6 col-md-12">
                    <div class="top-news__header-group top-news__header-group__blue">
                        <h2>Góc hỏi đáp</h2>
                    </div>
                    <div class="client-ask__list">
                        <div class="client-ask__item">
                            <div class="client-ask__question">
                                Bé nhà mình 4 tuổi có vết chàm từ nhỏ có dùng explaq được không?
                            </div>
                            <div class="client-ask__author">
                                <span class="client-ask__author-label">Được đăng bởi</span>
                                <span class="client-ask__author-name">Trần Hạo Dân</span>
                            </div>
                            <div class="client-ask__social">
                                <span class="client-ask__social-date">6 months ago</span>
                                <span class="client-ask__social-seen">703</span>
                            </div>
                        </div>
                        <div class="client-ask__item">
                            <div class="client-ask__question">
                                Bé nhà mình 4 tuổi có vết chàm từ nhỏ có dùng explaq được không?
                            </div>
                            <div class="client-ask__author">
                                <span class="client-ask__author-label">Được đăng bởi</span>
                                <span class="client-ask__author-name">Trần Hạo Dân</span>
                            </div>
                            <div class="client-ask__social">
                                <span class="client-ask__social-date">6 months ago</span>
                                <span class="client-ask__social-seen">703</span>
                            </div>
                        </div>
                        <div class="client-ask__item">
                            <div class="client-ask__question">
                                Bé nhà mình 4 tuổi có vết chàm từ nhỏ có dùng explaq được không?
                            </div>
                            <div class="client-ask__author">
                                <span class="client-ask__author-label">Được đăng bởi</span>
                                <span class="client-ask__author-name">Trần Hạo Dân</span>
                            </div>
                            <div class="client-ask__social">
                                <span class="client-ask__social-date">6 months ago</span>
                                <span class="client-ask__social-seen">703</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="side-ads__container col-xs-12 col-sm-6 col-md-12">
                    <a href="#" title="">
                        <img src="<?= $asset->baseUrl ?>/img/side_ads1.png" alt=""/>
                    </a>
                </div>
                <div class="side-ads__container col-xs-12 col-sm-6 col-md-12">
                    <a href="#" title="">
                        <img src="<?= $asset->baseUrl ?>/img/side_ads2.png" alt=""/>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $this->endContent(); ?>

<?php
use yii\helpers\Url;
use yii\easyii\modules\article\api\Article;
use yii\helpers\Html;
use yii\easyii\modules\carousel\api\Carousel;

$asset = \app\assets\FrontAsset::register($this);
$boderColor = [
    'blue',
    'violet',
    'yellow',
    'red',
    'cyan',
    'dark-blue',
    'purple',
    'green'
];

function renderNode($node, $boderColor) {
    if (!count($node->children)) {
        //$html = '<li>'.Html::a($node->title, ['/articles/cat', 'slug' => $node->slug]).'</li>';
        $html = '<li class="main-menu__li__level-one">';
        $html .= '<a class="main-menu__a__level-one main-menu__a__border-' . $boderColor . '" href="' . Url::to(['/articles/cat', 'slug' => $node->slug]). '" title="">' . mb_strtoupper($node->title, "utf8") . '</a>';
        $html .= '</li>';
    } else {
        $html = '<li class="main-menu__li__level-one main-menu__li__container">';
        $html .= '<a class="main-menu__a__level-one main-menu__a__border-' . $boderColor . '" href="' . Url::to(['/articles/cat', 'slug' => $node->slug]). '" title="">' . mb_strtoupper($node->title, "utf8") . '</a>';
        $html .= '<ul class="main-menu__ul__child">';
        foreach ($node->children as $child) {
            $html .= '<li class="main-menu__li__level-two">';
            $html .= '<a href="' . Url::to(['/articles/cat', 'slug' => $child->slug]). '" title="">' . mb_strtoupper($child->title, "utf8") . '</a>';
            $html .= '</li>';
        }
        $html .= '</ul>';
        $html .= '</li>';
    }
    return $html;
}
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
<?= Html::csrfMetaTags() ?>
		<meta property="fb:app_id" content="1688377211434055"/>
        <title><?= Html::encode($this->title) ?></title>
        <link rel="shortcut icon" href="<?= $asset->baseUrl ?>/favicon.ico" type="image/x-icon">
        <link rel="icon" href="<?= $asset->baseUrl ?>/favicon.ico" type="image/x-icon">
<?php $this->head() ?>
    </head>
    <body>

<?php $this->beginBody() ?>
		<script>
		  window.fbAsyncInit = function() {
			FB.init({
			  appId      : '1688377211434055',
			  xfbml      : true,
			  version    : 'v2.5'
			});
		  };

		  (function(d, s, id){
			 var js, fjs = d.getElementsByTagName(s)[0];
			 if (d.getElementById(id)) {return;}
			 js = d.createElement(s); js.id = id;
			 js.src = "//connect.facebook.net/vi_VN/sdk.js";
			 fjs.parentNode.insertBefore(js, fjs);
		   }(document, 'script', 'facebook-jssdk'));
		</script>
        <div class="page-wrapper">
            <div class="page-wrapper-content">
                <div class="header-container">
                    <div class="gb-view-container container-fluid">
                        <div class="row">
                            <div class="col-xs-12 col-md-4">
                                <a class="header-container__logo-link" href="<?= Url::to(['/']) ?>" title="">
                                    <img class="header-container__logo-img" src="<?= $asset->baseUrl ?>/img/logo.png" alt=""/>
                                </a>
                            </div>
                            <?php if ($banner = Carousel::byKey('banner')): ?>
                            <div class="col-xs-12 col-md-8">
                                <a class="header-container__ad-link" href="<?= $banner->link ?>" title="">
                                <?= Html::img($banner->thumb(728), ['class' => 'header-container__ad-img', 'alt' => $banner->title]) ?>
                                </a>
                            </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <div class="main-menu__container">
                    <div class="gb-view-container">
                        <ul class="main-menu__ul">
                            <li class="main-menu__li__level-one">
                                <a class="main-menu__a__level-one main-menu__a__border-orange main-menu__active-menu-item" href="<?= Url::to(['/']) ?>" title="">TRANG CHỦ</a>
                            </li>
<?php foreach (Article::tree() as $key => $node)
    echo renderNode($node, isset($boderColor[$key]) ? $boderColor[$key] : 'blue' ); ?>
                        </ul>
                    </div>
                </div>
<?= $content ?>
                <div class="footer-pictures__container">
                    <div class="gb-view-container">
                        <h2 class="footer-pictures__title">Hình ảnh Video đặc sắc</h2>
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-sm-4 col-md-15 footer-pictures__item">
                                    <a href="#" title="">
                                        <span class="footer-pictures__icon footer-pictures__icon-picture">&nbsp;</span>
                                        <img src="<?= $asset->baseUrl ?>/img/picture1.png" alt=""/>
                                        <span class="footer-pictures__text-container">
                                            <span class="footer-pictures__text">Bí quyết xóa tan nỗi ám ảnh mang tên &quot;jetlag&quot;</span>
                                        </span>
                                    </a>
                                </div>
                                <div class="col-sm-4 col-md-15 footer-pictures__item">
                                    <a href="#" title="">
                                        <span class="footer-pictures__icon footer-pictures__icon-video">&nbsp;</span>
                                        <img src="<?= $asset->baseUrl ?>/img/picture2.png" alt=""/>
                                        <span class="footer-pictures__text-container">
                                            <span class="footer-pictures__text">Bí quyết xóa tan nỗi ám ảnh</span>
                                        </span>
                                    </a>
                                </div>
                                <div class="col-sm-4 col-md-15 footer-pictures__item">
                                    <a href="#" title="">
                                        <span class="footer-pictures__icon footer-pictures__icon-picture">&nbsp;</span>
                                        <img src="<?= $asset->baseUrl ?>/img/picture3.png" alt=""/>
                                        <span class="footer-pictures__text-container">
                                            <span class="footer-pictures__text">Hội thảo du học Thụy Sĩ</span>
                                        </span>
                                    </a>
                                </div>
                                <div class="col-sm-4 col-md-15 footer-pictures__item">
                                    <a href="#" title="">
                                        <span class="footer-pictures__icon footer-pictures__icon-video">&nbsp;</span>
                                        <img src="<?= $asset->baseUrl ?>/img/picture4.png" alt=""/>
                                        <span class="footer-pictures__text-container">
                                            <span class="footer-pictures__text">Cơ hội học bổng 50% học phí tại trường Abbey</span>
                                        </span>
                                    </a>
                                </div>
                                <div class="col-sm-4 col-md-15 footer-pictures__item">
                                    <a href="#" title="">
                                        <span class="footer-pictures__icon footer-pictures__icon-picture">&nbsp;</span>
                                        <img src="<?= $asset->baseUrl ?>/img/picture5.png" alt=""/>
                                        <span class="footer-pictures__text-container">
                                            <span class="footer-pictures__text">Bí quyết xóa tan nỗi ám ảnh mang tên &quot;jetlag&quot;</span>
                                        </span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="footer-partner__container">
                    <div class="gb-view-container">
                        <div class="container-fluid">
                            <div class="row">
                                <a class="footer-partner__item" target="_blank" href="http://www.moet.gov.vn/?page=9.6" title="">
                                    <img alt="" src="<?= $asset->baseUrl ?>/img/partner1.png"/>
                                </a>
                                <a target="_blank" class="footer-partner__item" href="http://dantri.com.vn" title="">
                                    <img alt="" src="<?= $asset->baseUrl ?>/img/partner2.png"/>
                                </a>
                                <a target="_blank" class="footer-partner__item" href="http://news.zing.vn" title="">
                                    <img alt="" src="<?= $asset->baseUrl ?>/img/partner3.png"/>
                                </a>
                                <a target="_blank" class="footer-partner__item" href="http://vtv.vn" title="">
                                    <img alt="" src="<?= $asset->baseUrl ?>/img/partner4.png"/>
                                </a>
                                <a target="_blank" class="footer-partner__item" href="http://vnexpress.net" title="">
                                    <img alt="" width="180" src="<?= $asset->baseUrl ?>/img/partner5.png"/>
                                </a>
                                <a target="_blank" class="footer-partner__item" href="http://giaoduc.net.vn" title="">
                                    <img alt="" width="180" src="<?= $asset->baseUrl ?>/img/partner6.png"/>
                                </a>
<!--                                <a class="footer-partner__item" href="#" title="">
                                    <img alt="" src="<?= $asset->baseUrl ?>/img/partner-logo6.png"/>
                                </a>
                                <a class="footer-partner__item" href="#" title="">
                                    <img alt="" src="<?= $asset->baseUrl ?>/img/partner-logo7.png"/>
                                </a>
                                <a class="footer-partner__item" href="#" title="">
                                    <img alt="" src="<?= $asset->baseUrl ?>/img/partner-logo8.png"/>
                                </a>
                                <a class="footer-partner__item" href="#" title="">
                                    <img alt="" src="<?= $asset->baseUrl ?>/img/partner-logo9.png"/>
                                </a>-->
                            </div>
                        </div>
                    </div>
                </div>
                <div class="footer__container">
                    <div class="gb-view-container">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-xs-12 col-sm-6 col-md-4">
                                    <h3 class="footer__group-title">Danh mục</h3>

                                    <ul class="footer__menu-container">
                                        <?php foreach (Article::catRoot() as $item): ?>
                                        <li class="footer__menu-item">
                                             <?= Html::a($item['title'], ['articles/cat', 'slug' => $item['slug']]) ?>
                                        </li>
                                        <?php endforeach; ?>
                                    </ul>
                                </div>
                                <div class="col-xs-12 col-sm-6 col-md-4">
                                    <h3 class="footer__group-title">Liên hệ</h3>
                                    <div class="footer__contact-container">
                                        <div class="footer__contact-item">
                                            <span class="footer__contact-text footer__contact-location">21 Nguyễn Huy Tự, Hai Bà Trưng, Hà Nội</span>
                                        </div>
                                        <div class="footer__contact-item">
                                            <span class="footer__contact-text footer__contact-phone">098 231 9496</span>
                                        </div>
<!--                                        <div class="footer__contact-item">
                                            <span class="footer__contact-text footer__contact-fax"></span>
                                        </div>-->
                                        <div class="footer__contact-item">
                                            <span class="footer__contact-text footer__contact-mail">huongsayuri295@gmail.com</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-6 col-md-4">
                                    <h3 class="footer__group-title">Đăng ký nhận bản tin</h3>
                                    <div class="footer__contact-form-container">
                                        <form action="#" class="footer__form">
                                            <input type="text" class="footer__input-text" placeholder="Nhập địa chỉ email"/>
                                            <button type="submit" class="footer__input-submit">Đăng ký</button>
                                        </form>
                                    </div>
                                    <div class="footer__contact-text-information">
<!--                                        Giấy phép báo điện tử số : 236/GP-BTTT.<br/>-->
                                        Tổng Biên tập: <b>Nguyễn Thị Hương</b><br/>
<!--                                        Cơ quan chủ quản: Hội xuất bản Việt Nam<br/>
                                        Tòa soạn: D29 Trần Thái Tông, Cầu Giấy<br/>-->
                                        Chỉ được phát hành lại thông tin website khi có sự đồng ý bằng văn bản của báo<br/>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="footer-copyright__container">
                            <span class="footer-copyright__text">Copyright &copy; 2016 Manggiaoduc.vn All rights reserved</span>

                            <div class="footer-copyright__social-container">
                                <a href="#" title="">
                                    <img src="<?= $asset->baseUrl ?>/img/icon_facebook.png" alt=""/>
                                </a>
                                <a href="#" title="">
                                    <img src="<?= $asset->baseUrl ?>/img/icon_google_plus.png" alt=""/>
                                </a>
                                <a href="#" title="">
                                    <img src="<?= $asset->baseUrl ?>/img/icon_twitter.png" alt=""/>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<?php $this->endBody() ?>
        <script>
            $(document).ready(function() {    
                $(".top-news__list").niceScroll();
            });
         </script>
    </body>
</html>
<?php $this->endPage() ?>
<?php
use yii\helpers\Url;
use yii\easyii\modules\article\api\Article;
use yii\helpers\Html;
use yii\easyii\modules\carousel\api\Carousel;

$asset = \app\assets\FrontAsset::register($this);
$media = Article::media(6);

function renderNode($node, $color) {
    $html = '';
    if (!count($node->children)) {
        $html .= '<li class="' . $color . '"><a title="' . $node->title . '" href="' . Url::to(['/articles/cat', 'slug' => $node->slug]) . '">' . mb_strtoupper($node->title, "utf8") . '</a></li>';
    } else {
        $html .= '<li class="' . $color . '">';
        $html .= '<a title="' . $node->title . '" href="' . Url::to(['/articles/cat', 'slug' => $node->slug]) . '">' . mb_strtoupper($node->title, "utf8") . '<i class="fa fa-angle-down"></i></a>';
        $html .= '<span class="show-sub-menu"><i class="fa fa-plus-square-o"></i></span>';
        $html .= '<ul class="submenu">';
        foreach ($node->children as $child) {
            $html .= '<li><a title="' . $child->title . '" href="' . Url::to(['/articles/cat', 'slug' => $child->slug]) . '">' . mb_strtoupper($child->title, "utf8") . '</a></li>';
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
    <div class="header">
        <div class="container">
            <div class="row">
                <div class="col-md-4">

                    <a href="<?= Url::to(['/']) ?>" class="logo">
                        <img alt="" src="<?= $asset->baseUrl ?>/img/logo.png" />
                    </a>
                </div>
                <?php if ($banner = Carousel::byKey('banner')): ?>
                    <div class="col-md-8">
                        <div class="ads1 hidden-sm hidden-xs">
                            <a href="<?= $banner->link ?>" title="<?= $banner->title ?>">
                                <?= Html::img($banner->thumb(728), ['class' => 'header-container__ad-img', 'alt' => $banner->title]) ?>
                            </a>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <!--end header-->
    <div class="menu-outer">
        <div class="container">
            <div class="menu-inner">
                <div class="menu">

                    <div class="search-icon">
                        <i class="fa fa-search"></i>
                    </div>
                    <div class="search">
                        <form method="GET" action="<?= Url::to(['articles/search']) ?>">
                            <input type="text" name="keyword" placeholder="Nhập từ khóa..." />
                            <span class="close-search"><i class="fa fa-close"></i></span>
                        </form>
                    </div>

                    <h3 class="show-nav">
                        <i class="fa fa-navicon"></i> Menu
                    </h3>
                    <div class="nav">
                        <ul class="nav_ul">
                            <li class="color1 active"><a href="<?= Url::to(['/']) ?>">Trang chủ</a></li>
                            <?php 
                                foreach (Article::tree() as $key => $node) {
                                    echo renderNode($node, 'color' . ($key + 2)); 
                                }
                            ?>
                        </ul>
                    </div>


                </div>
            </div>
            <!--end menu-->
        </div>
    </div>
    <!--end menu-outer-->
    <div class="middle">
        <div class="container">
            <?= $content ?>
        </div>
    </div>
    <!--end middle-->
    <div class="videos">
        <div class="container">
            <h3>Hình ảnh video đặc sắc</h3>

            <?php if($media): ?>
            <div class="slider-video-outer">
                <div class="slider-video">
                    <?php foreach ($media as $item): ?>
                    <div class="slider-video-item">
                        <div class="effect-img">
                            <a href="<?= Url::to(['articles/view', 'slug' => $item->slug]) ?>">
                                <span class="icon-<?= ($item->model->type == 2) ? 'images' : 'video' ?>"></span>
                                <p>
                                    <?= Article::shortcut($item->title, 10) ?>
                                </p>
                                <?= Html::img($item->thumb(213, 147)) ?>
                            </a>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <?php endif; ?>
        </div>
    </div>
    <!--end videos-->
    <div class="partner">
        <div class="container">

            <div class="partner-slider-outer">

                <div class="partner-slider">
                    <div class="partner-slider-item">
                        <div>
                            <a target="_blank" href="http://www.moet.gov.vn/?page=9.6" title="">
                                <img alt="" src="<?= $asset->baseUrl ?>/img/partner1.png"/>
                            </a>
                        </div>
                    </div>
                    <div class="partner-slider-item">
                        <div>
                            <a target="_blank" href="http://dantri.com.vn" title="">
                                <img alt="" src="<?= $asset->baseUrl ?>/img/partner2.png"/>
                            </a>
                        </div>
                    </div>
                    <div class="partner-slider-item">
                        <div>
                            <a target="_blank" href="http://news.zing.vn" title="">
                                <img alt="" src="<?= $asset->baseUrl ?>/img/partner3.png"/>
                            </a>
                        </div>
                    </div>
                    <div class="partner-slider-item">
                        <div>
                            <a target="_blank" href="http://vtv.vn" title="">
                                <img alt="" src="<?= $asset->baseUrl ?>/img/partner4.png"/>
                            </a>
                        </div>
                    </div>
                    <div class="partner-slider-item">
                        <div>
                            <a target="_blank" href="http://vnexpress.net" title="">
                                <img src="<?= $asset->baseUrl ?>/img/partner5.png"/>
                            </a>
                        </div>
                    </div>
                    <div class="partner-slider-item">
                        <div>
                            <a target="_blank" href="http://giaoduc.net.vn" title="">
                                <img alt="" src="<?= $asset->baseUrl ?>/img/partner6.png"/>
                            </a>
                        </div>
                    </div>
                    <div class="partner-slider-item">
                        <div>
                            <a target="_blank" href="http://thanhnien.vn" title="">
                                <img alt="" src="<?= $asset->baseUrl ?>/img/partner7.png"/>
                            </a>
                        </div>
                    </div>
                    <div class="partner-slider-item">
                        <div>
                            <a target="_blank" href="http://tuoitre.vn" title="">
                                <img alt="" src="<?= $asset->baseUrl ?>/img/partner8.png"/>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--end partner-->
    <div class="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-sm-12">
                    <h3>DANH MỤC</h3>
                    <ul class="nav-footer">
                        <?php foreach (Article::catRoot() as $item): ?>
                        <li>
                            <?= Html::a('<i class="fa fa-angle-right"></i>&nbsp;' . mb_strtoupper($item['title'], "utf8"), ['articles/cat', 'slug' => $item['slug']]) ?>
                        </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
                <div class="col-md-4 col-sm-12">
                    <h3>LIÊN HỆ</h3>
                    <p>
                        <i class="fa fa-map-marker"></i> 21 Nguyễn Huy Tự, Hai Bà Trưng, Hà Nội
                    </p>
                    <p><i class="fa fa-phone"></i>098 231 9496</p>
<!--                    <p><i class="fa fa-print"></i>+65 231 9496</p>-->
                    <p><i class="fa fa-envelope"></i> huongsayuri295@gmail.com</p>
                </div>
                <div class="col-md-4 col-sm-12  col-three">
                    <h3>
                        ĐĂNG KÝ NHẬN BẢN TIN
                    </h3>
                    <div class="subcribe group">
                        <input type="text" placeholder="Nhập địa chỉ email" />
                        <input type="submit" value="Đăng ký" />
                    </div>
<!--                    <p>Giấy phép báo điện tử số: 236/GP-BTTT</p>-->
<!--                    <p>Tổng biên tập: <strong>Nguyễn Thị Hương</strong></p>-->
<!--                    <p>Cơ quan chủ quản: Hội xuất bản Việt Nam</p>
                    <p>
                        Tòa soạn: D29 Trần Thái Tông, Cầu Giấy
                    </p>-->
                    <p>Chỉ được phát hành lại thông tin website khi có sự đồng ý bằng văn bản của báo</p>
                </div>
            </div>
            <div class="allright group">
                <p>Copyright © 2016 Manggiaoduc.vn All rights reserved</p>
                <div class="social">
                    <a href="#" class="facebook">
                        <i class="fa fa-facebook"></i>
                    </a>
                    <a href="#" class="google">
                        <i class="fa fa-google"></i>
                    </a>
                    <a href="#" class="twitter">
                        <i class="fa fa-twitter"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!--end footer-->
    <div id="toTop">
        <i class="fa fa-angle-up"></i>
    </div>       
<?php $this->endBody() ?>
    </body>
</html>
<?php $this->endPage() ?>
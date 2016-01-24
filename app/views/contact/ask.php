<?php

use yii\easyii\modules\feedback\api\Feedback;
use yii\helpers\Url;

//use yii\easyii\modules\page\api\Page;
//
//$page = Page::get('page-contact');
//
$this->title = 'Đặt câu hỏi';
//$this->params['breadcrumbs'][] = $page->model->title;
?>
<div class="sitemap sitemap-color2">
    <a href="<?= Url::to(['contact/feedback']) ?>">
        Góc hỏi đáp
    </a>
    <span>
        <i class="fa fa-angle-double-right"></i>
    </span>
    <a href="#" >
        Gửi câu hỏi
    </a>

</div>
<div class="wrap-sent-question">
    <div class="form">
        <?php if(Yii::$app->request->get(Feedback::SENT_VAR)) : ?>
            <h4 class="text-success"><i class="glyphicon glyphicon-ok"></i>&nbsp;Phản hồi của bạn đã được gửi đi thành công,
                chúng tôi sẽ hồi đáp lại trong thời gian sớm nhất!</h4>
        <?php else : ?>
<!--        <div class="row">
            <div class="col-md-12 col-sm-12">
                <p>Tiêu đề</p>
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <input type="text" class="form-control" placeholder="Tiêu đề" />

                    </div>
                    <div class="col-md-6 col-sm-6">
                        <p>Tên người hỏi</p>
                        <input type="text" class="form-control" placeholder="Tên người hỏi" />
                    </div>

                    <div class="col-md-6 col-sm-6">
                        <p>Email</p>
                        <input type="text" class="form-control" placeholder="Email" />
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 col-sm-12">
                <p>Chứng minh bạn không phải robot *</p>

                <div class="captcha-box">
                    <input type="text" class="form-control" placeholder="Nhập mã bảo về" />
                    <span><i class="fa fa-refresh"></i></span>
                    <span><i class="fa fa-headphones"></i></span>
                    <div class="captcha">
                        <img alt="" src="img/captcha.png" />
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 col-sm-12">
                <p>Mô tả câu hỏi</p>


                <textarea class="form-control" placeholder="Mô tả câu hỏi"></textarea>
            </div>
        </div>

        <div class="text-right">
            <button class="btn-sent">
                Gửi câu hỏi
            </button>
        </div>-->
        <?= Feedback::form() ?>
        <?php endif; ?>
    </div>
</div>

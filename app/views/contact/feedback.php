<?php

use yii\easyii\modules\feedback\api\Feedback;
use yii\helpers\Url;
//$page = Page::get('page-contact');
//
$this->title = 'Phản hồi độc giả';
//$this->params['breadcrumbs'][] = $page->model->title;
?>
<div class="sitemap sitemap-color2">
    <a href="#">
        Góc hỏi đáp
    </a>

    <a href="<?= Url::to(['contact/ask']) ?>" class="qa">
        Đặt câu hỏi
    </a>

</div>
<?php if($data->count > 0) : ?>
<?php foreach($data->models as $item) : ?>
    <p>
        <h4><i class="fa fa-user"></i>&nbsp;<?= $item->name ?></h4>
        <b>Tiêu đề: </b><?= $item->title ?><br/>
        <b>Nội dung: </b><?= $item->text ?><br/>
    </p>
    <blockquote><b>Trả lời: </b><?= $item->answer_text ?></blockquote>
    <hr/>
<?php endforeach; ?>

<?= yii\widgets\LinkPager::widget([
    'pagination' => $data->pagination
]) ?>
<?php else : ?>
    <p><?= Yii::t('easyii', 'No records found') ?></p>
<?php endif; ?>    
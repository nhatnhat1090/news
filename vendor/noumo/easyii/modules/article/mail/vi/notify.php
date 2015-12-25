<?php
use yii\helpers\Html;

$this->title = $subject;
?>

<p><?= $message ?></p>

<p>Tiêu đề bài viết: <b><?= $postTitle ?></b></p>
<p>Truy cập để xem <?= Html::a('ở đây', $link) ?>.</p>
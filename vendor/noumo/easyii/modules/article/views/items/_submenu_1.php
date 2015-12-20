<?php
use yii\helpers\Url;

$action = $this->context->action->id;
$module = $this->context->module->id;
?>

<ul class="nav nav-tabs" id="selectPostType">
    <li <?= ($model->type === 1) ? 'class="active"' : '' ?>><a data-type="1" href="<?= Url::to(['/admin/'.$module.'/items/create', 'id' => $model->cate, 'type' => 1]) ?>">Tin thường</a></li>
    <li <?= ($model->type === 2) ? 'class="active"' : '' ?>><a data-type="2" href="<?= Url::to(['/admin/'.$module.'/items/create', 'id' => $model->cate, 'type' => 2]) ?>">Tin ảnh</a></li>
    <li <?= ($model->type === 3) ? 'class="active"' : '' ?>><a data-type="3" href="<?= Url::to(['/admin/'.$module.'/items/create', 'id' => $model->cate, 'type' => 3]) ?>">Tin video</a></li>
</ul>
<br>
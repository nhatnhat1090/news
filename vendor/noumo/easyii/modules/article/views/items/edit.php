<?php
use yii\helpers\Url;

$module = $this->context->module->id;
$this->title = $model->title;
?>
<?= $this->render('_menu', ['category' => $model->category]) ?>

<?php 
    if($this->context->module->settings['enablePhotos'] && ($model->type == '2')):
        echo $this->render('_submenu', ['model' => $model]);
    else:
?>
<ul class="nav nav-tabs">
    <li class="active"><a href="<?= Url::to(['/admin/'.$module.'/items/edit', 'id' => $model->primaryKey]) ?>"><?= Yii::t('easyii/article', 'Edit article') ?></a></li>
</ul>
<?php endif; ?>
<?= $this->render($model->type == 4 ? '_form_link' : '_form' , ['model' => $model]) ?>

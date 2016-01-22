<?php
$this->title = Yii::t('easyii/article', 'Create article');
?>
<?= $this->render('_menu', ['category' => $category]) ?>
<?= $model->type != 4 ? $this->render('_submenu_1', ['model' => $model]) : '' ?>
<?= $this->render($model->type == 4 ? '_form_link' : '_form', ['model' => $model]) ?>
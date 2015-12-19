<?php
$this->title = Yii::t('easyii/article', 'Create article');
?>
<?= $this->render('_menu', ['category' => $category]) ?>
<?= $this->render('_submenu_1') ?>
<?= $this->render('_form', ['model' => $model]) ?>
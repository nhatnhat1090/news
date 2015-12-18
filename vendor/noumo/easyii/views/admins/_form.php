<?php
    use yii\helpers\Html;
    use yii\widgets\ActiveForm;
?>
<?php $form = ActiveForm::begin(['enableAjaxValidation' => true]); ?>
<?= $form->field($model, 'username')->textInput($this->context->action->id === 'edit' ? ['disabled' => 'disabled'] : []) ?>
<?= $form->field($model, 'password')->passwordInput(['value' => '']) ?>
<?= $form->field($model, 'email')->textInput() ?>
<?= $form->field($model, 'role')->dropDownList($model->roles()) ?>
<?= $form->field($model, 'cate_manage')->checkboxList($cate, ['separator' => '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;']) ?>
<?= Html::submitButton(Yii::t('easyii', 'Save'), ['class' => 'btn btn-primary']) ?>
<?php ActiveForm::end(); ?>
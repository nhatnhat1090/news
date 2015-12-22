<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\easyii\models\Setting;
?>
<?php $form = ActiveForm::begin(['enableAjaxValidation' => true]); ?>
<?= $form->field($model, 'name')->textInput(!$model->isNewRecord ? ['disabled' => 'disabled'] : []) ?>
<?= $form->field($model, 'visibility')->checkbox(['uncheck' => Setting::VISIBLE_ALL]) ?>
<?= $form->field($model, 'title')->textarea(['disabled' => !IS_ROOT]) ?>
<?php if(!$model->isNewRecord && $model->name == 'root_password') : ?>
    <?= $form->field($model, 'value')->passwordInput(['value' => '']) ?>
    <?= $form->field($model, 'repeat_password')->passwordInput() ?>
<?php else: ?>
    <?= $form->field($model, 'value')->textarea() ?>
<?php endif; ?>


<?= Html::submitButton(Yii::t('easyii', 'Save'), ['class' => 'btn btn-primary']) ?>
<?php ActiveForm::end(); ?>
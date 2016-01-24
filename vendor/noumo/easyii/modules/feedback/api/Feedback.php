<?php
namespace yii\easyii\modules\feedback\api;

use Yii;
use yii\easyii\modules\feedback\models\Feedback as FeedbackModel;

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use yii\easyii\widgets\ReCaptcha;


/**
 * Feedback module API
 * @package yii\easyii\modules\feedback\api
 *
 * @method static string form(array $options = []) Returns fully worked standalone html form.
 * @method static array save(array $attributes) If you using your own form, this function will be useful for manual saving feedback's.
 */

class Feedback extends \yii\easyii\components\API
{
    const SENT_VAR = 'feedback_sent';

    private $_defaultFormOptions = [
        'errorUrl' => '',
        'successUrl' => ''
    ];

    public function api_form($options = [])
    {
        $model = new FeedbackModel;
        $settings = Yii::$app->getModule('admin')->activeModules['feedback']->settings;
        $options = array_merge($this->_defaultFormOptions, $options);

        ob_start();
        $form = ActiveForm::begin([
            'enableClientValidation' => true,
            'action' => Url::to(['/admin/feedback/send'])
        ]);

        echo Html::hiddenInput('errorUrl', $options['errorUrl'] ? $options['errorUrl'] : Url::current([self::SENT_VAR => 0]));
        echo Html::hiddenInput('successUrl', $options['successUrl'] ? $options['successUrl'] : Url::current([self::SENT_VAR => 1]));
        echo Html::beginTag('div', ['class' => 'row']);
        echo Html::beginTag('div', ['class' => 'col-md-12 col-sm-12']);
        //echo Html::tag('p', 'Tiêu đề');
        echo Html::beginTag('div', ['class' => 'row']);
        echo Html::beginTag('div', ['class' => 'col-md-12 col-sm-12']);
        echo $form->field($model, 'title')->textInput(['class' => 'form-control', 'placeholder' => 'Tiêu đề']);
        echo Html::endTag('div');
        echo Html::beginTag('div', ['class' => 'col-md-6 col-sm-6']);
        //echo Html::tag('p', 'Tên người hỏi');
        echo $form->field($model, 'name')->textInput(['class' => 'form-control', 'placeholder' => 'Tên người hỏi']);
        echo Html::endTag('div');
        echo Html::beginTag('div', ['class' => 'col-md-6 col-sm-6']);
        //echo Html::tag('p', 'Email');
        echo $form->field($model, 'email')->input('email', ['class' => 'form-control', 'placeholder' => 'Email']);
        echo Html::endTag('div');
        echo Html::endTag('div');
        echo Html::endTag('div');
        echo Html::endTag('div');
        
//        echo Html::beginTag('div', ['class' => 'row']);
//        echo Html::beginTag('div', ['class' => 'col-md-12 col-sm-12']);
//        echo $form->field($model, 'reCaptcha')->widget(ReCaptcha::className());
//        echo Html::endTag('div');
//        echo Html::endTag('div');
//        if($settings['enablePhone']) echo $form->field($model, 'phone');
//        if($settings['enableTitle']) echo $form->field($model, 'title');
        
        echo Html::beginTag('div', ['class' => 'row']);
        echo Html::beginTag('div', ['class' => 'col-md-6 col-sm-6']);
        echo $form->field($model, 'text')->textarea(['class' => 'form-control', 'placeholder' => 'Mô tả câu hỏi']);
        echo Html::endTag('div');
        echo Html::endTag('div');

        //if($settings['enableCaptcha']) echo $form->field($model, 'reCaptcha')->widget(ReCaptcha::className());
        echo Html::beginTag('div', ['class' => 'text-right']);
        echo Html::submitButton('Gửi câu hỏi', ['class' => 'btn-sent']);
        echo Html::endTag('div');
        ActiveForm::end();

        return ob_get_clean();
    }

    public function api_save($data)
    {
        $model = new FeedbackModel($data);
        if($model->save()){
            return ['result' => 'success'];
        } else {
            return ['result' => 'error', 'error' => $model->getErrors()];
        }
    }
}
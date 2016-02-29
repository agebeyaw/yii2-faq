<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use vladkukushkin\faq\models\Faq;

/* @var $this yii\web\View */
/* @var $model vladkukushkin\faq\models\Faq */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="faq-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'faq_title')->textInput(['maxlength' => true]) ?>

    <?=
    $form->field($model, 'faq_text')->widget(\vova07\imperavi\Widget::className(), [
        'settings' => [
            'lang' => 'ru',
            'minHeight' => 200,
            'paragraphize' => false,
            'cleanOnPaste' => false,
            'replaceDivs' => false,
            'linebreaks' => false,
            'plugins' => [
                'fullscreen',
                'imagemanager',
//                'video'
            ],
            'imageUpload' => Url::to(['/faq/image-upload']),
            'imageManagerJson' => Url::to(['/faq/images-get']),
        ]
    ]);

    ?>

    <?= $form->field($model, 'faq_show_on_main')->dropDownList(Faq::getVisibleOnMain()) ?>
    <?= $form->field($model, 'faq_language')->dropDownList([Yii::$app->language => Yii::$app->language]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

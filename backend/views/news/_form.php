<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use vova07\imperavi\Widget;
use kartik\file\FileInput;

/* @var $this yii\web\View */
/* @var $model common\models\News */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="news-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <div class="row">

        <div class="col-md-6">
            <fieldset>
                <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
            </fieldset>
        </div>

        <div class="col-md-6">
            <fieldset>
                <?= $form->field($model, 'imageFile')->widget(FileInput::classname(), [
                    'options' => ['accept' => 'image/*'],
                    'pluginOptions' => ['allowedFileExtensions' => ['jpg', 'png'], 'showUpload' => false],
                ]) ?>
            </fieldset>
        </div>

    </div>

    <div class="row">

        <div class="col-md-6">
            <fieldset>
                <?= $form->field($model, 'lead_text')->widget(Widget::className(), [
                    'settings' => [
                        'lang' => 'en',
                        'minHeight' => 250,
                        'plugins' => [
                            'fullscreen',
                            'table',
                            'video',
                            'fontsize',
                            'fontfamily',
                        ],
                    ]
                ])?>
            </fieldset>
        </div>

        <div class="col-md-6">
            <fieldset>
                <?= $form->field($model, 'content')->widget(Widget::className(), [
                    'settings' => [
                        'lang' => 'en',
                        'minHeight' => 250,
                        'plugins' => [
                            'fullscreen',
                            'table',
                            'video',
                            'fontsize',
                            'fontfamily',
                        ],
                    ]
                ]) ?>
            </fieldset>
        </div>

        
        <div class="form-group">
            <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
        </div>
        
    </div>

    <?php ActiveForm::end(); ?>

</div>

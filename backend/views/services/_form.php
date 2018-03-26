<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

\madand\knockoutjs\KnockoutAsset::register($this);

/* @var $this yii\web\View */
/* @var $model common\models\Services */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="services-form">

    <?php $form = ActiveForm::begin(['options' => ['data-bind' => 'submit: createService']]); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

    <script type="text/javascript">
        var data = <?php print json_encode($model); ?>

        function ViewModel (data)
        {
            self = this;

            self.Services = ko.mapping.fromJS(data);
        }
    </script>

</div>
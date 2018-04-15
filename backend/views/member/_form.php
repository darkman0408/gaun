<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Member */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="member-form">

    <?php $form = ActiveForm::begin([
        'id' => 'member-update-form',
        'options' => ['class' => 'form-horizontal'],
    ]); ?>
    
    <fieldset class="col-md-12">
        <legend>Member</legend>
        <?= $form->field($member, 'name')->textInput(['maxlength' => true]) ?>

        <?= $form->field($member, 'lastName')->textInput(['maxlength' => true]) ?>
    </fieldset>

    <fieldset class="col-md-12">
        <legend>Member Contact</legend>
        <?= $form->field($contact, 'phone')->textInput(['maxlength' => true]) ?>

        <?= $form->field($contact, 'email')->textInput(['maxlength' => true]) ?>
    </fieldset>

    <div class="form-group col-md-12">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

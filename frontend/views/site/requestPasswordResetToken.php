<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\PasswordResetRequestForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Request password reset';
$this->params['breadcrumbs'][] = $this->title;

require_once(Yii::getAlias('@common') . '/' . 'helpers/language.php');
languageSelector($language);
?>
<div class="site-request-password-reset">
    <h1><?= Yii::t('frontend', Html::encode($this->title)) ?></h1>

    <p><?= Yii::t('frontend', 'Please fill out your email. A link to reset password will be sent there.') ?></p>

    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'request-password-reset-form']); ?>

                <?= $form->field($model, 'email')->textInput(['autofocus' => true]) ?>

                <div class="form-group">
                    <?= Html::submitButton(Yii::t('frontend', 'Send'), ['class' => 'btn btn-primary']) ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>

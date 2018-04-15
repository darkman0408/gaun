<?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

use yii\helpers\Html;

$this->title = $name;

require_once(Yii::getAlias('@common') . '/' . 'helpers/language.php');
languageSelector($language);
?>
<div class="site-error">

    <h1><?= Yii::t('frontend', Html::encode($this->title)) ?></h1>

    <div class="alert alert-danger">
        <?= Yii::t('frontend', nl2br(Html::encode($message))) ?>
    </div>

    <p>
        <?= Yii::t('frontend', 'The above error occurred while the Web server was processing your request.') ?>
    </p>
    <p>
        <?= Yii::t('frontend', 'Please contact us if you think this is a server error. Thank you.') ?>
    </p>

</div>

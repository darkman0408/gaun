<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\MemberContact */

$this->title = 'Update Member Contact: {nameAttribute}';
$this->params['breadcrumbs'][] = ['label' => 'Member Contacts', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="member-contact-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

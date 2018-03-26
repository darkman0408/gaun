<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Member */

$this->title = 'Update Member: ' . $member->name;
$this->params['breadcrumbs'][] = ['label' => 'Members', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $member->name, 'url' => ['view', 'id' => $member->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="member-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'member' => $member,
        'contact' => $contact,
    ]) ?>

</div>

<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\MemberContact */

$this->title = 'Create Member Contact';
$this->params['breadcrumbs'][] = ['label' => 'Member Contacts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="member-contact-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

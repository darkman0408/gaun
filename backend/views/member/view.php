<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use common\models\Member;
use common\models\MemberContact;
use yii\data\ActiveDataProvider;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model common\models\Member */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Members'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="member-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            'lastName',

            [
                'attribute' => 'phone',
                'format' => 'text',
                'value' => function($model) {
                    $phones = $model->memberContacts;
                    if(empty($phones))
                        return null;
                    else
                        return implode(', ', ArrayHelper::getColumn($phones, 'phone'));
                },
            ],

            [
                'attribute' => 'email',
                'format' => 'text',
                'value' => function($model) {
                    $emails = $model->memberContacts;
                    if(empty($emails))
                        return null;
                    else
                        return implode(', ', ArrayHelper::getColumn($emails, 'email'));
                },
            ],
        ],
    ]) ?>
</div>

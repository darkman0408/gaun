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
$this->params['breadcrumbs'][] = ['label' => 'Members', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="member-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?php
        $dataProvider = new ActiveDataProvider([
            'query' => Member::find()->joinWith('memberContacts')
                ->where(['memberContact.memberId' => $model->id]),
        ]);
    ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            'id',
            'name',
            'lastName',

            [
                'attribute' => 'phone',
                'value' => function($model, $key, $index, $column) {
                    $phones = $model->memberContacts;
                    if(empty($phones))
                    {
                        return null;
                    }
                    else
                    {
                        return implode(', ', ArrayHelper::getColumn($phones, 'phone'));
                    }
                },
            ],
            [
                'attribute' => 'email',
                'value' => function($model, $key, $index, $column) {
                    $emails = $model->memberContacts;
                    if(empty($emails))
                        return null;
                    else
                        return implode(', ', ArrayHelper::getColumn($emails, 'email'));
                },
            ],
        ],
    ]); ?>
</div>

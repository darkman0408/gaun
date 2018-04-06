<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $searchModel common\models\MemberSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Members');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="member-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Member'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
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

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>

<?php

use yii\helpers\Html;
use yii\grid\GridView;
use common\models\User;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $searchModel common\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Users');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'username',
            'email:email',
            [
                'attribute' => 'status',
                'format' => 'text',
                'value' => function($model) {
                    switch($model->status) {
                        case User::STATUS_ACTIVE :
                            return 'Active';
                            break;
                        case User::STATUS_DELETED :
                            return 'Deleted';
                            break;
                        default:
                            return 'Undefined';
                    }
                }
            ],
            [
                'label' => 'User Role',
                'attribute' => 'role',
                'filter' => ArrayHelper::map(Yii::$app->authManager->getRoles(), 'name', 'name'),
            ],
            [
                'attribute' => 'created_at',
                'label' => 'Created at',
                'format' => 'datetime',
            ],
            [
                'attribute' => 'updated_at',
                'label' => 'Updated at',
                'format' => 'datetime',
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>

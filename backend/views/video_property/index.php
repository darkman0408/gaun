<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\VideoPropertySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Video Properties');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="video-property-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Video Property'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'videoId',
            'title',
            'image',
            'imageWidth',
            //'imageHeight',
            //'code:ntext',
            //'width',
            //'height',
            //'providerName',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>

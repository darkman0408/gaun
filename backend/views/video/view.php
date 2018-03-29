<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model common\models\Video */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Videos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="video-view">

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

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            'video:ntext',

            [
                'attribute' => 'title',
                'format' => 'text',
                'value' => function($model) {
                    $titles = $model->videoProperties;
                    if(empty($titles))
                        return null;
                    else
                        return implode(', ', ArrayHelper::getColumn($titles, 'title'));
                },
            ],
            [
                'attribute' => 'code',
                'format' => 'text',
                'value' => function($model) {
                    $codes = $model->videoProperties;
                    if(empty($codes))
                        return null;
                    else
                        return implode(', ', ArrayHelper::getColumn($codes, 'code'));
                },
            ],
            [
                'attribute' => 'image',
                'format' => 'text',
                'value' => function($model) {
                    $images = $model->videoProperties;
                    if(empty($images))
                        return null;
                    else
                        return implode(', ', ArrayHelper::getColumn($images, 'image'));
                },
            ],
            [
                'attribute' => 'providerName',
                'format' => 'text',
                'value' => function($model) {
                    $providerNames = $model->videoProperties;
                    if(empty($providerNames))
                        return null;
                    else
                        return implode(', ', ArrayHelper::getColumn($providerNames, 'providerName'));
                },
            ],

        ],
    ]) ?>

</div>

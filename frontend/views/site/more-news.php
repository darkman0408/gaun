<?php

use yii\helpers\Html;

$this->title = 'News';
$this->params['breadcrumbs'][] = ' / ' . $this->title;

?>

<div class="site-news">

    <h2><?= Html::encode($model->title) ?></h2>
    <hr>
    <div class="row">
        <div class="col-md-12">
            <div>
                <?= Html::encode($model->lead_text) ?>
            </div>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-md-12">
            <div>
                <?= Html::encode($model->content) ?>
            </div>
        </div>
    </div>
</div>
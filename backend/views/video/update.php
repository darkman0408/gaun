<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Video */

$this->title = 'Update Video: ' . $video->name;
$this->params['breadcrumbs'][] = ['label' => 'Videos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $video->name, 'url' => ['view', 'id' => $video->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="video-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'video' => $video,
    ]) ?>

    <?php 
        var_dump($video);
    ?>
    <hr>
    <p>PROPERTY:</p>
    <p><?php var_dump($property->title); ?></p>
    <p><?php var_dump($property->image); ?></p>
    <p><?php var_dump($property->imageWidth); ?></p>
    <p><?php var_dump($property->imageHeight); ?></p>
    <p><?php var_dump($property->code); ?></p>
    <p><?php var_dump($property->width); ?></p>
    <p><?php var_dump($property->height); ?></p>
    <p><?php var_dump($property->providerName); ?></p>
    <hr>

</div>

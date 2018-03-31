<?php

use yii\helpers\Html;

$this->title = 'News';
$this->params['breadcrumbs'][] = 'About' . ' / ' . $this->title;
?>

<div class="site-news">

    <div class="row">
        <?php 
        
        $data = [];

        foreach($model as $val) : ?>

        <div class="col-md-3">
            <div class="thumbnail">
                <?= Html::img(Yii::getAlias('@docUrl') . '/' . $val->lead_photo) ?>
                <div class="caption">
                    <h3><?= $val->title ?></h3>
                    <p><?= $val->lead_text ?></p>
                    <p><a href="#" class="btn btn-primary" role="button">More</a></p>
                </div>

            </div>
        </div>

    </div><div class="row">

        <?php endforeach; ?>
    </div>

</div>
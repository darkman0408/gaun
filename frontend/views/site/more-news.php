<?php

use yii\helpers\Html;

$this->title = 'News';
$this->params['breadcrumbs'][] = ' / ' . $this->title;

require_once(Yii::getAlias('@common') . '/' . 'helpers/language.php');
languageSelector($language);
?>

<div class="site-news">

    <h2><?= Yii::t('frontend', Html::encode($model->title)) ?></h2>
    <hr>
    <div class="row">
        <div class="col-md-12">
            <?= Html::img('/' . $model->lead_photo, ['class' => 'img-responsive']) ?>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-md-12">
            <div>
                <?= Yii::t('frontend', Html::encode($model->lead_text)) ?>
            </div>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-md-12">
            <div>
                <?= Yii::t('frontend', Html::encode($model->content)) ?>
            </div>
        </div>
    </div>
</div>
<?php

use yii\helpers\Html;

$this->title = 'News';
$this->params['breadcrumbs'][] = 'About' . ' / ' . $this->title;

require_once(Yii::getAlias('@common') . '/' . 'helpers/language.php');
languageSelector($language);
?>

<div class="site-news">

    <div class="row">
        <?php 

        $data = [];

        foreach($model as $val) : ?>

        <div class="col-md-3">
            <div class="thumbnail">
                <?= Html::img('/' . $val->lead_photo) ?>
                <div class="caption">
                    <h3><?= Yii::t('frontend', $val->title) ?></h3>
                    <p><?= Yii::t('frontend', $val->lead_text) ?></p>
                    <p><?= Html::a(Yii::t('frontend', 'Read more'), ['/site/more-news', 'id' => $val->id], ['class' => 'btn btn-primary']) ?></p>
                </div>

            </div>
        </div>

    </div><div class="row">

        <?php endforeach; ?>
    </div>

</div>
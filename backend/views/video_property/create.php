<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\VideoProperty */

$this->title = Yii::t('app', 'Create Video Property');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Video Properties'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="video-property-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

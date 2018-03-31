<?php

use yii\helpers\Html;
use kartik\tabs\TabsX;

$this->title = 'Gallery';
$this->params['breadcrumbs'][] = 'About' . ' / ' . $this->title;

?>

<?php 
    $img_url = Yii::getAlias('@docUrl');
    $items = [];

    foreach($model as $val)
    {
        $items = [
            'image' => $val->image,
        ];
        print Html::img($img_url . '/' . $val->image);
    }

?>
<?php

use yii\helpers\Html;

$this->title = 'Services';
$this->params['breadcrumbs'][] = 'About' . ' / ' . $this->title;

\madand\knockoutjs\KnockoutAsset::register($this);

require_once(Yii::getAlias('@common') . '/' . 'helpers/language.php');
languageSelector($language);
?>

<div class="site-services">

    <div class="panel panel-default">
        <div class="panel-body">
        <h4><?= Yii::t('frontend', 'What we can offer:') ?></h4>
        </div>
    </div>

    <div class="row" data-bind="foreach: data">
        <div class="col-md-4">
            <div class="row service-row">
                <div class="name-header">
                    <span data-bind="text: name"></span>
                </div>
                <div>
                    <span data-bind="text: description"></span>
                </div>
            </div>
        </div>
    </div>

</div>

<script type="text/javascript">

    ko.applyBindings({
        data: [
            <?php
            $data = [];
            foreach($model as $val)
            {
                $data = [
                    'name' => Yii::t('frontend', $val->name),
                    'description' => Yii::t('frontend', $val->description)
                ]; 
                $data = json_encode($data);               
                print $data;
                print (',');
            } 
            ?> 
        ]
    });

</script>
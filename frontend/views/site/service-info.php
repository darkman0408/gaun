<?php

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'Service Info';
$this->params['breadcrumbs'][] = 'About' . ' / ' . $this->title;

require_once(Yii::getAlias('@common') . '/' . 'helpers/language.php');
languageSelector($language);
?>

<div class="site-serviceInfo">

    <div class="row">
        <div class="col-md-6">
            <a href="#" class="thumbnail">
                <img src="/images/map-1.jpg" alt="kaprije mapa" />
            </a>
        </div>
        <div class="col-md-6">
            <a href="#" class="thumbnail">    
                <img src="/images/mapKaprije1.png" alt="kaprije mapa" />               
            </a>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4">
            <h3><?= Yii::t('frontend', 'In circle of 5 Nm are:') ?></h3>
            <p>
                <ul>
                    <li><?= Yii::t('frontend', 'Island') ?> Žirje</li>
                    <li><?= Yii::t('frontend', 'Island') ?> Zmajan</li>
                    <li><?= Yii::t('frontend', 'Island') ?> Zlarin</li>
                    <li>Vodice</li>
                    <li>Tribunj</li>
                    <li>Jezera</li>
                    <li>Tisno</li>
                </ul>
            </p>
        </div>
        <div class="col-md-4">
            <h3><?= Yii::t('frontend', 'In circle of 10 Nm are:') ?></h3>
            <p>
                <ul>
                    <li>National Park Kornati</li>
                    <li>Murter</li>
                    <li>Pirovac</li>
                    <li>Šibenik</li>
                    <li>Brodarica</li>
                    <li>Primošten</li>
                    <li>Grebaštica</li>
                </ul>
            </p>
        </div>
        <div class="col-md-4">
            <h3><?= Yii::t('frontend', 'In circle of 15 Nm are:') ?></h3>
            <p>
                <ul>
                    <li>Pakoštane</li>
                    <li>Biograd na Moru</li>
                    <li>Drage</li>
                    <li>Vransko Jezero</li>
                    <li>Island Pašman</li>
                    <li>Rogoznica</li>
                </ul>
            </p>
        </div>
    </div>

</div>
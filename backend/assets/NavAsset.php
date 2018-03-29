<?php

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class NavAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/navigation.css',
    ];
    public $js = [
        'js/navigation.js'
    ];
    public $depends = [
    ];
    public $cssOptions = ['position' => \yii\web\View::POS_HEAD];
    public $jsOptions = ['position' => \yii\web\View::POS_HEAD];
}

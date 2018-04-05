<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class GalleryAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'https://cdnjs.cloudflare.com/ajax/libs/lightgallery/1.6.9/css/lightgallery.min.css',
    ];
    public $js = [
        'https://cdnjs.cloudflare.com/ajax/libs/jquery-mousewheel/3.1.13/jquery.mousewheel.min.js',
        'https://cdnjs.cloudflare.com/ajax/libs/lightgallery/1.6.9/js/lightgallery.min.js',
        'https://cdnjs.cloudflare.com/ajax/libs/lightgallery/1.6.9/js/lightgallery-all.min.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
    public $jsOptions = [
        'position' => \yii\web\View::POS_HEAD
    ];
}

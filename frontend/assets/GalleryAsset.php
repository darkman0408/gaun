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
        //'css/photoswipe.css',
        //'css/default-skin/default-skin.css',
        'https://cdnjs.cloudflare.com/ajax/libs/lightgallery/1.6.8/css/lightgallery.css',
    ];
    public $js = [
        //'js/photoswipe.min.js',
        //'js/photoswipe-ui-default.min.js',
        'https://cdnjs.cloudflare.com/ajax/libs/jquery-mousewheel/3.1.13/jquery.mousewheel.min.js',
        'https://cdnjs.cloudflare.com/ajax/libs/lightgallery/1.6.8/js/lightgallery.min.js',
        'https://cdnjs.cloudflare.com/ajax/libs/lightgallery/1.6.8/js/lightgallery-all.min.js',
        'js/lg-fullscreen.js',
        'js/lg-thumbnail.min.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
    public $jsOptions = [
        'position' => \yii\web\View::POS_HEAD
    ];
}

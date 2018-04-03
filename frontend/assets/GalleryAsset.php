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
        'css/photoswipe.css',
        'css/default-skin/default-skin.css',
    ];
    public $js = [
        'js/photoswipe.min.js',
        'js/photoswipe-ui-default.min.js',
        'js/my-gallery.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
    public $jsOptions = [
        
    ];
}

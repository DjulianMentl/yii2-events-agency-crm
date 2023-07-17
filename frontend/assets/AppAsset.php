<?php

namespace frontend\assets;

use yii\bootstrap\BootstrapAsset;
use yii\bootstrap\BootstrapPluginAsset;
use yii\web\AssetBundle;
use yii\web\YiiAsset;

/**
 * Main frontend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'themes/main/css/font-awesome.min.css',
        'themes/main/css/style.css',
    ];
    public $js = [
        'themes/main/js/scripts.js',
    ];
    public $depends = [
        YiiAsset::class,
        BootstrapPluginAsset::class,
    ];
}

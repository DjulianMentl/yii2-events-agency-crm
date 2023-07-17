<?php

namespace frontend\assets;

use yii\web\AssetBundle;

class ResetAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'themes/main/css/reset.css',
    ];
}

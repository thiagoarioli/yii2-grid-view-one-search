<?php

namespace thiagoarioli\onesearch;


use yii\web\AssetBundle;

class GridViewOneSearchAsset extends  AssetBundle
{

    public $sourcePath = __DIR__ ;
    public $js = [
        'js/debounce.js',
        'js/gridviewKeyup.js'
    ];
    public $depends = [
        'yii\web\YiiAsset',
    ];

}

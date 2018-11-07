<?php
/**
 * Created by PhpStorm.
 * User: manuel.gonzalez
 * Date: 23.10.2018
 * Time: 17:17
 */
namespace magp\bootstrappanel;


use yii\web\AssetBundle;

class PanelAsset extends AssetBundle
{
    public $sourcePath = __DIR__;

    public $css = [
        'assets/style.css',
    ];

    public $js = [
		'assets/displacement.js',
    ];
}
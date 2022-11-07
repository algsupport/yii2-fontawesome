<?php
/**
 * NpmFreeAssetBundle.php
 * @author Albert Gukasian
 * @link https://www.algsupport.com
 */

namespace algsupport\yii\fontawesome;

use yii\web\AssetBundle;

/**
 * Class NpmFreeAssetBundle
 * @package algsupport\yii\fontawesome
 */
class NpmFreeAssetBundle extends AssetBundle
{
    public $sourcePath = '@vendor/fortawesome/font-awesome';

    public $css = [
        'css/all.min.css',
    ];

    public $publishOptions = [
        'only' => [
            'css/*',
            'js/*',
            'webfonts/*',
            'sprites/*',
            'svgs/*',
        ],
    ];
}

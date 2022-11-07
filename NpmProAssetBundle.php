<?php
/**
 * NpmProAssetBundle.php
 * @author Albert Gukasian
 * @link https://www.algsupport.com
 */

namespace algsupport\yii\fontawesome;

use yii\web\AssetBundle;

/**
 * Class NpmProAssetBundle
 * @package algsupport\yii\fontawesome
 */
class NpmProAssetBundle extends AssetBundle
{
    public $sourcePath = '@app/node_modules/@fortawesome/fontawesome-pro';

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

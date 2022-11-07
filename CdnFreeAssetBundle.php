<?php
/**
 * CdnFreeAssetBundle.php
 * @author Albert Gukasian
 * @link https://www.algsupport.com
 */

namespace algsupport\yii\fontawesome;

use yii\web\AssetBundle;

/**
 * Class CdnFreeAssetBundle
 * @package algsupport\yii\fontawesome
 */
class CdnFreeAssetBundle extends AssetBundle
{
    /**
     * @inherit
     */
    public $css = [
        'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css',
    ];
}

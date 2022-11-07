<?php
/**
 * FontAwesome.php
 * @author Albert Gukasian
 * @link https://www.algsupport.com
 */

namespace algsupport\yii\fontawesome;

use algsupport\yii\fontawesome\component;

/**
 * Class FA
 * @package algsupport\yii\fontawesome
 */
class FontAwesome
{
    /**
     * CSS class prefix
     * @var string
     */
    public static string $cssPrefix = '';

    /**
     * CSS class prefix
     * @var string
     */
    public static string $basePrefix = 'fa';

    /**
     * Creates an `Icon` component that can be used to FontAwesome html icon
     *
     * @param string $name
     * @param array $options
     * @return component\Icon
     */
    public static function icon(string $name, array $options = []): component\Icon
    {
        return new component\Icon(static::$cssPrefix, $name, $options);
    }

    /**
     * Shortcut for `icon()` method
     * @param string $name
     * @param array $options
     * @return component\Icon
     * @see icon()
     *
     */
    public static function i(string $name, array $options = []): component\Icon
    {
        return static::icon($name, $options);
    }

    /**
     * Creates an `Stack` component that can be used to FontAwesome html icon
     *
     * @param array $options
     * @return component\Stack
     */
    public static function stack(array $options = []): component\Stack
    {
        return new component\Stack(static::$cssPrefix, $options);
    }

    /**
     * Shortcut for `stack()` method
     * @param array $options
     * @return component\Stack
     * @see stack()
     *
     */
    public static function s(array $options = []): component\Stack
    {
        return static::stack($options);
    }

    /**
     * @param array $options
     * @return component\UnorderedList
     */
    public static function ul(array $options = []): component\UnorderedList
    {
        return new component\UnorderedList(static::$cssPrefix, $options);
    }

    /**
     * Size values
     * @see component\Icon::size
     */
    public const SIZE_LARGE = 'lg';
    public const SIZE_LG = 'lg';
    public const SIZE_SMALL = 'sm';
    public const SIZE_SM = 'sm';
    public const SIZE_EXTRA_SMALL = 'xs';
    public const SIZE_XS = 'xs';
    public const SIZE_2X = '2x';
    public const SIZE_3X = '3x';
    public const SIZE_4X = '4x';
    public const SIZE_5X = '5x';
    public const SIZE_6X = '6x';
    public const SIZE_7X = '7x';
    public const SIZE_8X = '8x';
    public const SIZE_9X = '9x';
    public const SIZE_10X = '10x';

    /**
     * Rotate values
     * @see component\Icon::rotate
     */
    public const ROTATE_90 = '90';
    public const ROTATE_180 = '180';
    public const ROTATE_270 = '270';

    /**
     * Flip values
     * @see component\Icon::flip
     */
    public const FLIP_HORIZONTAL = 'horizontal';
    public const FLIP_VERTICAL = 'vertical';
}

<?php
/**
 * Icon.php
 * @author Albert Gukasian
 * @link https://www.algsupport.com
 */

namespace algsupport\yii\fontawesome\component;

use algsupport\yii\fontawesome\FontAwesome;
use yii\base\InvalidConfigException;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;

/**
 * Class Icon
 * @package algsupport\yii\fontawesome\component
 */
class Icon
{
    /**
     * @var array
     */
    private array $options;

    /**
     * @param string $cssPrefix
     * @param string $name
     * @param array $options
     */
    public function __construct(string $cssPrefix, string $name, array $options = [])
    {
        Html::addCssClass($options, $cssPrefix);

        if (!empty($name)) {
            Html::addCssClass($options, FontAwesome::$basePrefix . '-' . $name);
        }

        $this->options = $options;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        $options = $this->options;

        $tag = ArrayHelper::remove($options, 'tag', 'i');

        return Html::tag($tag, null, $options);
    }

    /**
     * @return Icon
     * @throws InvalidConfigException
     */
    public function inverse(): Icon
    {
        return $this->addCssClass(FontAwesome::$basePrefix . '-inverse');
    }

    /**
     * @return Icon
     * @throws InvalidConfigException
     */
    public function spin(): Icon
    {
        return $this->addCssClass(FontAwesome::$basePrefix . '-spin');
    }

    /**
     * @return Icon
     * @throws InvalidConfigException
     */
    public function pulse(): Icon
    {
        return $this->addCssClass(FontAwesome::$basePrefix . '-pulse');
    }

    /**
     * @return Icon
     * @throws InvalidConfigException
     */
    public function fixedWidth(): Icon
    {
        return $this->addCssClass(FontAwesome::$basePrefix . '-fw');
    }

    /**
     * @return Icon
     * @throws InvalidConfigException
     */
    public function li(): Icon
    {
        return $this->addCssClass(FontAwesome::$basePrefix . '-li');
    }

    /**
     * @return Icon
     * @throws InvalidConfigException
     */
    public function border(): Icon
    {
        return $this->addCssClass(FontAwesome::$basePrefix . '-border');
    }

    /**
     * @return Icon
     * @throws InvalidConfigException
     */
    public function pullLeft(): Icon
    {
        return $this->addCssClass(FontAwesome::$basePrefix . '-pull-left');
    }

    /**
     * @return Icon
     * @throws InvalidConfigException
     */
    public function pullRight(): Icon
    {
        return $this->addCssClass(FontAwesome::$basePrefix . '-pull-right');
    }

    /**
     * @param string $value
     * @return Icon
     * @throws InvalidConfigException
     */
    public function size(string $value): Icon
    {
        $values = [
            FontAwesome::SIZE_LG,
            FontAwesome::SIZE_SM,
            FontAwesome::SIZE_XS,
            FontAwesome::SIZE_2X,
            FontAwesome::SIZE_3X,
            FontAwesome::SIZE_4X,
            FontAwesome::SIZE_5X,
            FontAwesome::SIZE_6X,
            FontAwesome::SIZE_7X,
            FontAwesome::SIZE_8X,
            FontAwesome::SIZE_9X,
            FontAwesome::SIZE_10X,
        ];

        return $this->addCssClass(
            FontAwesome::$basePrefix . '-' . $value,
            in_array($value, $values, true),
            sprintf(
                '%s - invalid value. Use one of the constants: %s.',
                'FontAwesome::size()',
                implode(', ', $values)
            )
        );
    }

    /**
     * @param string $value
     * @return Icon
     * @throws InvalidConfigException
     */
    public function rotate(string $value): Icon
    {
        $values = [FontAwesome::ROTATE_90, FontAwesome::ROTATE_180, FontAwesome::ROTATE_270];

        return $this->addCssClass(
            FontAwesome::$basePrefix . '-rotate-' . $value,
            in_array($value, $values, true),
            sprintf(
                '%s - invalid value. Use one of the constants: %s.',
                'FontAwesome::rotate()',
                implode(', ', $values)
            )
        );
    }

    /**
     * @param string $value
     * @return Icon
     * @throws InvalidConfigException
     */
    public function flip(string $value): Icon
    {
        $values = [FontAwesome::FLIP_HORIZONTAL, FontAwesome::FLIP_VERTICAL];

        return $this->addCssClass(
            FontAwesome::$basePrefix . '-flip-' . $value,
            in_array($value, [FontAwesome::FLIP_HORIZONTAL, FontAwesome::FLIP_VERTICAL], true),
            sprintf(
                '%s - invalid value. Use one of the constants: %s.',
                'FontAwesome::flip()',
                implode(', ', $values)
            )
        );
    }

    /**
     * @param string $class
     * @param bool $condition
     * @param bool|string $throw
     * @return Icon
     * @throws InvalidConfigException
     * @codeCoverageIgnore
     */
    public function addCssClass(string $class, bool $condition = true, bool|string $throw = false): Icon
    {
        if ($condition === false) {
            if (!empty($throw)) {
                $message = !is_string($throw)
                    ? 'Condition is false'
                    : $throw;

                throw new InvalidConfigException($message);
            }
        } else {
            Html::addCssClass($this->options, $class);
        }

        return $this;
    }
}

<?php
/**
 * Stack.php
 * @author Albert Gukasian
 * @link https://www.algsupport.com
 */

namespace algsupport\yii\fontawesome\component;

use algsupport\yii\fontawesome\FontAwesome;
use yii\base\InvalidConfigException;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;

/**
 * Class Stack
 * @package algsupport\yii\fontawesome\component
 */
class Stack
{
    /**
     * @var string
     */
    private string $iconCssPrefix;

    /**
     * @var array
     */
    private array $options;

    /**
     * @var Icon
     */
    private Icon $icon_front;

    /**
     * @var ?string
     */
    private ?string $text_front = null;

    /**
     * @var Icon
     */
    private Icon $icon_back;

    /**
     * @param string $iconCssPrefix
     * @param array $options
     */
    public function __construct(string $iconCssPrefix, array $options = [])
    {
        $this->iconCssPrefix = $iconCssPrefix;

        Html::addCssClass($options, FontAwesome::$basePrefix . '-stack');

        $this->options = $options;
    }

    /**
     * @return string
     * @throws InvalidConfigException
     */
    public function __toString()
    {
        $options = $this->options;

        $tag = ArrayHelper::remove($options, 'tag', 'span');

        $template = ArrayHelper::remove($options, 'template', '{back}{front}');

        $iconBack = ($this->icon_back instanceof Icon)
            ? $this->icon_back->addCssClass(FontAwesome::$basePrefix . '-stack-2x')
            : null;

        if ($this->text_front !== null) {
            $contentFront = $this->text_front;
        } else {
            $contentFront = $this->icon_front instanceof Icon
                ? $this->icon_front->addCssClass(FontAwesome::$basePrefix . '-stack-1x')
                : null;
        }

        $content = str_replace(['{back}', '{front}'], [$iconBack, $contentFront], $template);

        return Html::tag($tag, $content, $options);
    }

    /**
     * @param string|Icon $icon
     * @param array $options
     * @return Stack
     */
    public function icon(Icon|string $icon, array $options = []): Stack
    {
        if (is_string($icon)) {
            $icon = new Icon($this->iconCssPrefix, $icon, $options);
        }

        $this->icon_front = $icon;

        return $this;
    }

    /**
     * @param string $text
     * @param array $options
     * @return Stack
     */
    public function text(string $text = '', array $options = []): static
    {
        $tag = ArrayHelper::remove($options, 'tag', 'span');

        Html::addCssClass($options, FontAwesome::$basePrefix . '-stack-1x');

        $this->text_front = Html::tag($tag, $text, $options);

        return $this;
    }

    /**
     * @param string|Icon $icon
     * @param array $options
     * @return Stack
     */
    public function on(Icon|string $icon, array $options = []): static
    {
        if (is_string($icon)) {
            $icon = new Icon($this->iconCssPrefix, $icon, $options);
        }

        $this->icon_back = $icon;

        return $this;
    }
}

<?php
	/**
	 * UnorderedList.php
	 * @author Albert Gukasian
	 * @link https://www.algsupport.com
	 */

	namespace algsupport\yii\fontawesome\component;

	use algsupport\yii\fontawesome\FontAwesome;
	use yii\helpers\ArrayHelper;
	use yii\helpers\Html;

	/**
	 * Class UnorderedList
	 * @package algsupport\yii\fontawesome\component
	 */
	class UnorderedList
	{
		protected string $iconCssPrefix;

		/**
		 * @var array
		 */
		protected array $options = [];

		/**
		 * @var array
		 */
		protected array $items = [];

		/**
		 * @param string $iconCssPrefix
		 * @param array $options
		 */
		public function __construct(string $iconCssPrefix, array $options = [])
		{
			$this->iconCssPrefix = $iconCssPrefix;

			Html::addCssClass($options, FontAwesome::$basePrefix . '-ul');

			$options['item'] = static function ($item, $index) {
				return $item($index);
			};

			$this->options = $options;
		}

		/**
		 * @return string
		 */
		public function __toString()
		{
			return Html::ul($this->items, $this->options);
		}

		/**
		 * @param string $label
		 * @param array $options
		 * @return UnorderedList
		 */
		public function item(string $label, array $options = []): UnorderedList
		{
			$this->items[] = function () use ($label, $options) {
				$tag = ArrayHelper::remove($options, 'tag', 'li');

				$icon = ArrayHelper::remove($options, 'icon');
				if (!empty($icon)) {
					$icon = is_string($icon) ? (string)(new Icon($this->iconCssPrefix, $icon))->li() : $icon;
				}

				$content = trim($icon . $label);

				return Html::tag($tag, $content, $options);
			};

			return $this;
		}
	}

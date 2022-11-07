Yii 2 [Font Awesome](http://fortawesome.github.io/Font-Awesome/) Asset Bundle
===============================

This extension provides an assets bundle with [Font Awesome](https://fontawesome.com/)
for [Yii framework 2.0](http://www.yiiframework.com/) applications and helper to use icons.

For license information check the [LICENSE](https://github.com/algsupport/yii2-fontawesome/blob/master/LICENSE)-file.


Support
-------
* [GutHub issues](https://github.com/algsupport/yii2-fontawesome/issues)

Fontawesome version
-------------------
| Version of font-awesome | Version of extension |
|------------------------:|:---------------------|
|                     6.* | ~4.0                 |


Installation
------------

The preferred way to install this extension is through [composer](https://getcomposer.org/).

Either run

```bash
composer require "algsupport/yii2-fontawesome:~4.0"
```

or add

```
"algsupport/yii2-fontawesome": "~4.0",
```

to the `require` section of your `composer.json` file.

Usage with fa pro version
-------------------------

### CDN
Create a new kit here - https://fontawesome.com/kits

Add your kit in the `assetManager` config under `components` :

```php
return [
    // ...
    'components' => [
        'assetManager' => [
            'bundles' => [
                'algsupport\yii\fontawesome\CdnProAssetBundle' => [
                    'css' => [
                        'your kit',
                    ]
                ],
            ],
        ],
    ],
];

```

Add `CdnProAssetBundle` as depends of your app asset bundle:
```php
class AppAsset extends AssetBundle
{
	// ...

	public $depends = [
		// ...
		'algsupport\yii\fontawesome\CdnProAssetBundle'
	];
}

```

Or inject `CdnProAssetBundle` in your view:

```php
\algsupport\yii\fontawesome\CdnProAssetBundle::register($this);
```

### NPM
Install npm package of font:
```
npm install @fortawesome/fontawesome-pro
```
or 
```
yarn add @fortawesome/fontawesome-pro
```

And add `NpmProAssetBundle` as depends of your app asset bundle:
```php
class AppAsset extends AssetBundle
{
	// ...

	public $depends = [
		// ...
		'algsupport\yii\fontawesome\NpmProAssetBundle'
	];
}

```

Or inject `NpmProAssetBundle` in your view:

```php
algsupport\yii\fontawesome\NpmProAssetBundle::register($this);
```

### Optional

In order for do not install the free version of the font-awesome package, you can add it to the `replace` section of `composer.json`.

```
  "replace": {
    "fortawesome/font-awesome": "*"
  },
```

Usage with fa free version
-------------------------

### CDN
Add `CdnFreeAssetBundle` as depends of your app asset bundle:
```php
class AppAsset extends AssetBundle
{
	// ...

	public $depends = [
		// ...
		'algsupport\yii\fontawesome\CdnFreeAssetBundle'
	];
}

```

Or inject `CdnFreeAssetBundle` in your view:

```php
algsupport\yii\fontawesome\CdnFreeAssetBundle::register($this);
```

# Composer

Free version of package `fortawesome/font-awesome` already installed in vendor.

Add `NpmFreeAssetBundle` as depends of your app asset bundle:
```php
class AppAsset extends AssetBundle
{
	// ...

	public $depends = [
		// ...
		'algsupport\yii\fontawesome\NpmFreeAssetBundle'
	];
}

```

Or inject `NpmFreeAssetBundle` in your view:

```php
algsupport\yii\fontawesome\NpmFreeAssetBundle::register($this);
```

Class reference
---------------

Namespace: `algsupport\yii\fontawesome`;

### Class `FAB`, `FAL`, `FAR`, `FAS` or `FontAwesome`

* `static FAR::icon($name, $options=[])` - Creates an [`component\Icon`](#class-componenticon) that can be used to FontAwesome html icon
  * `$name` - name of icon in font awesome set.
  * `$options` - additional attributes for `i.fa` html tag.
* `static FAR::stack($name, $options=[])` - Creates an [`component\Stack`](#class-componentstack) that can be used to FontAwesome html icon
  * `$options` - additional attributes for `span.fa-stack` html tag.

### Class `component\Icon`

* `(string)$Icon` - render icon
* `$Icon->addCssClass($value)` - add to html tag css class in `$value`
  * `$value` - name of css class
* `$Icon->inverse()` - add to html tag css class `fa-inverse`
* `$Icon->spin()` - add to html tag css class `fa-spin`
* `$Icon->fixedWidth()` - add to html tag css class `fa-fw`
* `$Icon->ul()` - add to html tag css class `fa-ul`
* `$Icon->li()` - add to html tag css class `fa-li`
* `$Icon->border()` - add to html tag css class `fa-border`
* `$Icon->pullLeft()` - add to html tag css class `pull-left`
* `$Icon->pullRight()` - add to html tag css class `pull-right`
* `$Icon->size($value)` - add to html tag css class with size
  * `$value` - size value (variants: `FA::SIZE_LARGE`, `FA::SIZE_2X`, `FA::SIZE_3X`, `FA::SIZE_4X`, `FA::SIZE_5X`)
* `$Icon->rotate($value)` - add to html tag css class with rotate
  * `$value` - rotate value (variants: `FA::ROTATE_90`, `FA::ROTATE_180`, `FA::ROTATE_270`)
* `$Icon->flip($value)` - add to html tag css class with rotate
  * `$value` - flip value (variants: `FA::FLIP_HORIZONTAL`, `FA::FLIP_VERTICAL`)

### Class `component\Stack`

* `(string)$Stack` - render icon stack
* `$Stack->icon($icon, $options=[])` - set icon for stack
  * `$icon` - name of icon or `component\Icon` object
  * `$options` - additional attributes for icon html tag.
* `$Stack->icon($icon, $options=[])` - set background icon for stack
  * `$icon` - name of icon or `component\Icon` object
  * `$options` - additional attributes for icon html tag.

Helper examples
---------------

```php
use algsupport\yii\fontawesome\FAS;
// or (only in pro version https://fontawesome.com/pro)
// use algsupport\yii\fontawesome\FAR;
// use algsupport\yii\fontawesome\FAL;
// use algsupport\yii\fontawesome\FAB;

// normal use
echo FAS::icon('home'); // <i class="fas fa-home"></i>

// shortcut
echo FAS::i('home'); // <i class="fas fa-home"></i>

// icon with additional attributes
echo FAS::icon(
    'arrow-left', 
    ['class' => 'big', 'data-role' => 'arrow']
); // <i class="big fas fa-arrow-left" data-role="arrow"></i>

// icon in button
echo Html::submitButton(
    Yii::t('app', '{icon} Save', ['icon' => FAS::icon('check')])
); // <button type="submit"><i class="fas fa-check"></i> Save</button>

// icon with additional methods
echo FAS::icon('cog')->inverse();    // <i class="fas fa-cog fa-inverse"></i>
echo FAS::icon('cog')->spin();       // <i class="fas fa-cog fa-spin"></i>
echo FAS::icon('cog')->fixedWidth(); // <i class="fas fa-cog fa-fw"></i>
echo FAS::icon('cog')->li();         // <i class="fas fa-cog fa-li"></i>
echo FAS::icon('cog')->border();     // <i class="fas fa-cog fa-border"></i>
echo FAS::icon('cog')->pullLeft();   // <i class="fas fa-cog pull-left"></i>
echo FAS::icon('cog')->pullRight();  // <i class="fas fa-cog pull-right"></i>

// icon size
echo FAS::icon('cog')->size(FAS::SIZE_3X);
// values: FAS::SIZE_LARGE, FAS::SIZE_2X, FAS::SIZE_3X, FAS::SIZE_4X, FAS::SIZE_5X
// <i class="fas fa-cog fa-size-3x"></i>

// icon rotate
echo FAS::icon('cog')->rotate(FAS::ROTATE_90); 
// values: FAS::ROTATE_90, FAS::ROTATE_180, FAS::ROTATE_180
// <i class="fas fa-cog fa-rotate-90"></i>

// icon flip
echo FAS::icon('cog')->flip(FAS::FLIP_VERTICAL); 
// values: FAS::FLIP_HORIZONTAL, FAS::FLIP_VERTICAL
// <i class="fas fa-cog fa-flip-vertical"></i>

// icon with multiple methods
echo FAS::icon('cog')
        ->spin()
        ->fixedWidth()
        ->pullLeft()
        ->size(FAS::SIZE_LARGE);
// <i class="fas fa-cog fa-spin fa-fw pull-left fa-size-lg"></i>

// icons stack
echo FAS::stack()
        ->icon('twitter')
        ->on('square-o');
// <span class="fa-stack">
//   <i class="fas fa-square-o fa-stack-2x"></i>
//   <i class="fas fa-twitter fa-stack-1x"></i>
// </span>

// icons stack with additional attributes
echo FAS::stack(['data-role' => 'stacked-icon'])
     ->on(FAS::Icon('square')->inverse())
     ->icon(FAS::Icon('cog')->spin());
// <span class="fa-stack" data-role="stacked-icon">
//   <i class="fas fa-square-o fa-inverse fa-stack-2x"></i>
//   <i class="fas fa-cog fa-spin fa-stack-1x"></i>
// </span>

// Stacking text and icons
echo FAS::stack()
     ->on(FAS::Icon('square'))
     ->text('1');
// <span class="fa-stack">
//   <i class="fas fa-square fa-stack-2x"></i>
//   <span class="fa-stack-1x">1</span>
// </span>

// Stacking text and icons with options
echo FAS::stack()
     ->on(FAS::Icon('square'))
     ->text('1', ['tag'=>'strong', 'class'=>'stacked-text']);
// <span class="fa-stack">
//   <i class="fas fa-square fa-stack-2x"></i>
//   <strong class="stacked-text fa-stack-1x">1</strong>
// </span>
// Now you can add some css for vertical text positioning:
.stacked-text { margin-top: .3em; }

// unordered list icons 
echo FAS::ul(['data-role' => 'unordered-list'])
     ->item('Bullet item', ['icon' => 'circle'])
     ->item('Checked item', ['icon' => 'check']);
// <ul class="fa-ul" data-role="unordered-list">
//   <li><i class="fas fa-circle fa-li"></i>Bullet item</li>
//   <li><i class="fas fa-check fa-li"></i>Checked Item</li>
// </span>

// autocomplete icons name in IDE
echo FAS::icon(FAS::_COG);
echo FAS::icon(FAS::_DESKTOP);
echo FAS::stack()
     ->on(FAS::_CIRCLE_O)
     ->icon(FAS::_TWITTER);
```

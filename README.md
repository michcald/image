image
=====

A PHP library for manipulating images


```php
use Michcald\Image\Filter;

$img = new Michcald\Image('image.jpg');

$blurFilter = new Filter\BlurFilter();
$blurFilter->setLevel(10);
$img->applyFilter($blurFilter);

$brightnessFilter = new Filter\BrightnessFilter();
$brightnessFilter->setLevel(100);
$img->applyFilter($brightnessFilter);

$img->applyFilter(new Filter\GrayscaleFilter());

header('Content-Type: image/jpg');

imagejpeg($img->getResource());
```

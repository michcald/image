image
=====

A PHP library for manipulating images


```php
$img = new Michcald\Image('image.jpg');

$blurFilter = new Michcald\Image\Filter\BlurFilter();
$blurFilter->setLevel(10);
$img->applyFilter($blurFilter);

$brightnessFilter = new Michcald\Image\Filter\BrightnessFilter();
$brightnessFilter->setLevel(100);
$img->applyFilter($brightnessFilter);

$img->applyFilter(new \Michcald\Image\Filter\GrayscaleFilter());

header('Content-Type: image/jpg');

imagejpeg($img->getResource());
```

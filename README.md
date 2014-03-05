image
=====

A PHP library for manipulating images


```php
use Michcald\Image\Filter;
use Michcald\Image\Transformer;

$img = new Michcald\Image('image.jpg');

// filtering
$blurFilter = new Filter\BlurFilter();
$blurFilter->setLevel(10);
$img->applyFilter($blurFilter);

$brightnessFilter = new Filter\BrightnessFilter();
$brightnessFilter->setLevel(100);
$img->applyFilter($brightnessFilter);

$img->applyFilter(new Filter\GrayscaleFilter());

// transformation
$crop = new Transformer\Crop();
$crop->setX1(50)
    ->setY1(10)
    ->setX2(75)
    ->setY2(100);
$img->applyTransformer($crop);

$resizeToHeight = new Transformer\ResizeToHeight();
$resizeToHeight->setHeight(600);
$img->applyTransformer($resizeToHeight);

header('Content-Type: image/jpg');

imagejpeg($img->getResource());
```

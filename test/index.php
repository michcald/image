<?php

if(!extension_loaded('gd')) {
    throw new \Exception('Required extension GD is not loaded!');
}

require '../vendor/autoload.php';

use Michcald\Image\Filter;
use Michcald\Image\Transformer;

$img = new Michcald\Image('images/ramsey.jpg');

$blur = new Filter\Blur();
$blur->setLevel(10);
//$img->applyFilter($blur);

$colorize = new Filter\Colorize();
$colorize->setRed(90)
    ->setBlue(90)
    ->setGreen(90)
    ->setAlpha(1);

$pixelate = new Filter\Pixelate();
$pixelate->setBlockSize(11)
    ->setAdvancedPix(true);

$bright = new Filter\Brightness();
$bright->setLevel(100);

//$img->applyFilter(new \Michcald\Image\Filter\Negate());
//$img->applyFilter(new \Michcald\Image\Filter\Grayscale());
//$img->applyFilter(new \Michcald\Image\Filter\Grayscale());
//$img->applyFilter(new \Michcald\Image\Filter\Smooth());
//$img->applyFilter(new Michcald\Image\Filter\Emboss());
//$img->applyFilter(new Michcald\Image\Filter\EdgeDetect());
//$img->applyFilter(new Michcald\Image\Filter\Contrast());
//$img->applyFilter($colorize);
//$img->applyFilter($pixelate);
//$img->applyFilter($bright);

$crop = new Transformer\Crop();
$crop->setX1(50)
    ->setY1(10)
    ->setX2(75)
    ->setY2(100);
//$img->applyTransformer($crop);

$resize = new Transformer\Resize();
$resize->setHeight(600)
    ->setWidth(600)
    ->setResample(true);
//$img->applyTransformer($resize);

$adapt = new Transformer\Adapt();
$adapt->setWidth(200)
    ->setHeight(200);
$img->applyTransformer($adapt);

header('Content-Type: image/jpg');

imagejpeg($img->getResource());
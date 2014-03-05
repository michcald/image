<?php

require 'vendor/autoload.php';

$img = new Michcald\Image('ramsey.jpg');

$blur = new Michcald\Image\Filter\BlurFilter();
$blur->setLevel(10);
//$img->applyFilter($blur);

$colorize = new Michcald\Image\Filter\ColorizeFilter();
$colorize->setRed(90)
    ->setBlue(90)
    ->setGreen(90)
    ->setAlpha(1);

$pixelate = new Michcald\Image\Filter\PixelateFilter();
$pixelate->setBlockSize(11)
    ->setAdvancedPix(true);

$bright = new Michcald\Image\Filter\BrightnessFilter();
$bright->setLevel(100);

//$img->applyFilter(new \Michcald\Image\Filter\NegateFilter());
//$img->applyFilter(new \Michcald\Image\Filter\GrayscaleFilter());
//$img->applyFilter(new \Michcald\Image\Filter\GrayscaleFilter());
//$img->applyFilter(new \Michcald\Image\Filter\SmoothFilter());
//$img->applyFilter(new Michcald\Image\Filter\EmbossFilter());
//$img->applyFilter(new Michcald\Image\Filter\EdgeDetectFilter());
//$img->applyFilter(new Michcald\Image\Filter\ContrastFilter());
//$img->applyFilter($colorize);
//$img->applyFilter($pixelate);
//$img->applyFilter($bright);

header('Content-Type: image/jpg');

imagejpeg($img->getResource());
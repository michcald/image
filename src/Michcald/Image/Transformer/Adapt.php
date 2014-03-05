<?php

namespace Michcald\Image\Transformer;

use Michcald\Image\Transformer\ResizeToHeight;
use Michcald\Image\Transformer\ResizeToWidth;
use Michcald\Image\Transformer\Crop;

/**
 * Fits the image and cut the boundaries
 * 
 * @author Michael Caldera <michcald@gmail.com>
 */
class Adapt extends \Michcald\Image\Transformer
{
    private $width;
    
    private $height;
    
    public function setWidth($width)
    {
        $this->width = $width;
        
        return $this;
    }
    
    public function setHeight($height)
    {
        $this->height = $height;
        
        return $this;
    }
    
    public function transform(\Michcald\Image $image)
    {
        $resizeToWidthTransformer = new ResizeToWidth();
        $resizeToHeightTransformer = new ResizeToHeight();
        $cropTransformer = new Crop();
        
        $width = $this->width;
        $height = $this->height;
        
        if(($width < $height && $image->getWidth() < $image->getHeight()) || 
            ($width > $height && $image->getWidth() > $image->getHeight())) {
            
            if (abs($image->getWidth()-$width) > abs($image->getHeight()-$height)) {
                $resizeToHeightTransformer->setHeight($height)
                    ->transform($image);
            } else {
                $resizeToWidthTransformer->setWidth($width)
                    ->transform($image);
            }
        }
        else {
            if ($width < $height) {
                $resizeToHeightTransformer->setHeight($height)
                    ->transform($image);
            } else {
                $resizeToWidthTransformer->setWidth($width)
                    ->transform($image);
            }
        }
        
        if($image->getHeight() == $height && $image->getWidth() < $width) {
            $resizeToWidthTransformer->setWidth($width)
                ->transform($image);
            
            $y1 = ($image->getHeight() - $height) / 2;
            
            $cropTransformer->setX1(0)
                ->setY1($y1)
                ->setX2($width)
                ->setY2($y1 + $height)
                ->transform($image);
            
        } else if($image->getWidth() == $width && $image->getHeight() < $height) {
            $resizeToHeightTransformer->setHeight($height)
                ->transform($image);
            
            $x1 = ($image->getWidth() - $width) / 2;
            
            $cropTransformer->setX1($x1)
                ->setY1(0)
                ->setX2($x1 + $width)
                ->setY2($height)
                ->transform($image);
            
        } else {
            if($image->getHeight() == $height) {
                $x1 = ($image->getWidth() - $width) / 2;
                
                $cropTransformer->setX1($x1)
                    ->setY1(0)
                    ->setX2($x1 + $width)
                    ->setY2($height)
                    ->transform($image);
                
            } else {
                $y1 = ($image->getHeight() - $height) / 2;
                
                $cropTransformer->setX1(0)
                    ->setY1($y1)
                    ->setX2($width)
                    ->setY2($y1 + $height)
                    ->transform($image);
            }
        }
    }

}
    
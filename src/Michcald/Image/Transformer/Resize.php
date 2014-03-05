<?php

namespace Michcald\Image\Transformer;

class Resize extends \Michcald\Image\Transformer
{
    private $width;
    
    private $height;
    
    private $resample = false;
    
    public function setWidth($width)
    {
        $this->width = (int)$width;
        
        return $this;
    }
    
    public function setHeight($height)
    {
        $this->height = $height;
        
        return $this;
    }
    
    public function setResample($resample)
    {
        $this->resample = (bool)$resample;
        
        return $this;
    }
    
    public function transform(\Michcald\Image $image)
    {
        $newImage = imagecreatetruecolor($this->width, $this->height);

        // preserve alphatransparency in PNGs
        imagealphablending($newImage, false);
        imagesavealpha($newImage, true);

        if($this->resample) {
            imagecopyresampled(
                $newImage, 
                $image->getResource(), 
                0, 0, 0, 0, 
                $this->width, 
                $this->height, 
                $image->getWidth(), 
                $image->getHeight()
            );
        } else {
            imagecopyresized(
                $newImage, 
                $image->getResource(), 
                0, 0, 0, 0, 
                $this->width, 
                $this->height, 
                $image->getWidth(), 
                $image->getHeight()
            );
        }
        
        $image->setResource($newImage);
    }
}

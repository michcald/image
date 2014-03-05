<?php

namespace Michcald\Image\Transformer;

/**
 * Scales an image to fit the specified width
 * 
 * @author Michael Caldera <michcald@gmail.com>
 */
class ResizeToWidth extends \Michcald\Image\Transformer
{
    private $width;
    
    private $resample = false;
    
    public function setWidth($width)
    {
        $this->width = $width;
        
        return $this;
    }
    
    public function setResample($resample)
    {
        $this->resample = (bool)$resample;
        
        return $this;
    }

    public function transform(\Michcald\Image $image)
    {
        $ratio = $image->getHeight() / $image->getWidth();

        $newHeight = $this->width * $ratio;

        $newImage = imagecreatetruecolor($this->width, $newHeight);

        imagealphablending($newImage, false);
        imagesavealpha($newImage, true);

        if($this->resample) {
            imagecopyresampled(
                $newImage, 
                $image->getResource(), 
                0, 0, 0, 0, 
                $this->width, 
                $newHeight, 
                $image->getWidth(), 
                $image->getHeight()
            );
        } else {
            imagecopyresized(
                $newImage, 
                $image->getResource(), 
                0, 0, 0, 0, 
                $this->width, 
                $newHeight, 
                $image->getWidth(), 
                $image->getHeight()
            );
        }
        
        $image->setResource($newImage);
    }

}
    
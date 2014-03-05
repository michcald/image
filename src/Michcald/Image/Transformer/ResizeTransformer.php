<?php

namespace Michcald;

class ResizeTransformer extends AbstractTransformer
{
    private $width;
    
    private $height;
    
    private $resample = true;
    
    public function transform(Michcald\Image $image)
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

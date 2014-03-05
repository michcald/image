<?php

namespace Michcald\Image\Transformer;

/**
 * Scales an image to fit the specified height
 * 
 * @author Michael Caldera <michcald@gmail.com>
 */
class ResizeToHeight extends Michcald\Image\Transformer
{
    private $height;
    
    private $resample = false;
    
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
    
    public function transform(Michcald\Image $image)
    {
        $ratio = $image->getHeight() / $image->getWidth();

        $newWidth = $this->height / $ratio;

        $newImage = imagecreatetruecolor($newWidth, $this->height);

        imagealphablending($newImage, false);
        imagesavealpha($new, true);

        if($this->resample) {
            imagecopyresampled(
                $newImage, 
                $image->getResource(), 
                0, 0, 0, 0, 
                $newWidth, 
                $this->height, 
                $image->getWidth(), 
                $image->getHeight()
            );
        } else {
            imagecopyresized(
                $newImage, 
                $this->getResource(), 
                0, 0, 0, 0, 
                $newWidth, 
                $this->height, 
                $image->getWidth(), 
                $image->getHeight()
            );
        }
        
        $image->setResource($newImage);
    }
}

<?php

namespace Michcald\Image\Transformer;

/**
 * @author Michael Caldera <michcald@gmail.com>
 */
class Crop extends Michcald\Image\Transformer
{
    private $x1;
    
    private $y1;
    
    private $x2;
    
    private $y2;
    
    private $width;
    
    private $height;
    
    private $resample = false;
    
    public function setX1($x1)
    {
        $this->x1 = (int)$x1;
        
        return $this;
    }
    
    public function setY1($y1)
    {
        $this->y1 = (int)$y1;
        
        return $this;
    }
    
    public function setX2($x2)
    {
        $this->x2 = (int)$x2;
        
        return $this;
    }
    
    public function setY2($y2)
    {
        $this->y2 = (int)$y2;
        
        return $this;
    }
    
    public function setHeight($height)
    {
        $this->height = (int)$height;
        
        return $this;
    }
    
    public function setWidth($width)
    {
        $this->width = (int)$width;
        
        return $this;
    }
    
    public function setResample($resample)
    {
        $this->resample = (bool)$resample;
        
        return $this;
    }

    public function transform(\Michcald\Image $image)
    {
        if($this->x2 < $this->x1) {
            $tmp = $this->x1;
            $this->x1 = $this->x2;
            $this->x2 = $tmp;
        }
        
        if($this->y2 < $this->y1) {
            $tmp = $this->y1;
            $this->y1 = $this->y2;
            $this->y2 = $tmp;
        }
        
        $cropWidth = $this->x2 - $this->x1;
        $cropHeight = $this->y2 - $this->y1;

        $newImage = imagecreatetruecolor($cropWidth, $cropHeight);

        imagealphablending($newImage, false);
        imagesavealpha($newImage, true);

        if($this->resample) {
            imagecopyresampled(
                $newImage, 
                $image->getResource(), 
                0, 0, 
                $this->x1, 
                $this->y1, 
                $cropWidth, 
                $cropHeight, 
                $cropWidth, 
                $cropHeight
            );
        } else {
            imagecopyresized(
                $newImage, 
                $image->getResource(), 
                0, 0, 
                $this->x1, 
                $this->y1, 
                $cropWidth, 
                $cropHeight, 
                $cropWidth, 
                $cropHeight
            );
        }
        
        $image->setResource($newImage);
    }

}

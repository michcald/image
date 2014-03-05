<?php

namespace Michcald\Image\Filter;

use Michcald\Image\Filter;

/**
 * @author Michael Caldera <michcald@gmail.com>
 */
class Colorize extends Filter
{
    private $red;
    
    private $green;
        
    private $blue;
    
    private $alpha;
    
    public function setRed($red)
    {
        $this->red = $red;
        
        return $this;
    }
    
    public function setGreen($green)
    {
        $this->green = $green;
        
        return $this;
    }
    
    public function setBlue($blue)
    {
        $this->blue = $blue;
        
        return $this;
    }
    
    public function setAlpha($alpha)
    {
        $this->alpha = $alpha;
        
        return $this;
    }
    
    public function filter(\Michcald\Image $image)
    {
        imagefilter(
            $image->getResource(), 
            IMG_FILTER_COLORIZE, 
            $this->red,
            $this->green,
            $this->blue,
            $this->alpha
        );
    }
}
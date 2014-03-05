<?php

namespace Michcald\Image\Filter;

/**
 * @author Michael Caldera <michcald@gmail.com>
 */
class BrightnessFilter extends AbstractFilter
{
    private $level = 1;
    
    public function setLevel($level)
    {
        $this->level = $level;
        
        return $this;
    }
    
    public function filter(\Michcald\Image $image)
    {
        imagefilter($image->getResource(), IMG_FILTER_BRIGHTNESS, $this->level);
    }
}

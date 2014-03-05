<?php

namespace Michcald\Image\Filter;

use Michcald\Image\Filter;

/**
 * @author Michael Caldera <michcald@gmail.com>
 */
class Smooth extends Filter
{
    private $level = 1;
    
    public function setLevel($level)
    {
        $this->level = $level;
        
        return $this;
    }
    
    public function filter(\Michcald\Image $image)
    {
        imagefilter($image->getResource(), IMG_FILTER_SMOOTH, $this->level);
    }
}

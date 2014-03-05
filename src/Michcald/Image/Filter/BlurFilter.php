<?php

namespace Michcald\Image\Filter;

/**
 * @author Michael Caldera <michcald@gmail.com>
 */
class BlurFilter extends AbstractFilter
{
    private $level = 1;
    
    public function setLevel($level)
    {
        $this->level = $level;
        
        return $this;
    }
    
    public function filter(\Michcald\Image $image)
    {
        for($i=0; $i<$this->level; $i++) {
            imagefilter($image->getResource(), IMG_FILTER_GAUSSIAN_BLUR);
        }
    }
}

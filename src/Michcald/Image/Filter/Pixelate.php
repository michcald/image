<?php

namespace Michcald\Image\Filter;

use Michcald\Image\Filter;

/**
 * @author Michael Caldera <michcald@gmail.com>
 */
class Pixelate extends Filter
{
    private $blockSize = 2;
    
    private $advancedPix = false;
    
    public function setBlockSize($size)
    {
        $this->blockSize = $size;
        
        return $this;
    }
    
    public function setAdvancedPix($advancedPix)
    {
        $this->advancedPix = (bool)$advancedPix;
        
        return $this;
    }
    
    public function filter(\Michcald\Image $image)
    {
        imagefilter(
            $image->getResource(), 
            11,
            $this->blockSize,
            $this->advancedPix
        );
    }
}

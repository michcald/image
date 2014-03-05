<?php

namespace Michcald\Image\Filter;

use Michcald\Image\Filter;

/**
 * Invert image colors
 * 
 * @author Michael Caldera <michcald@gmail.com>
 */
class Negate extends Filter
{
    public function filter(\Michcald\Image $image)
    {
        imagefilter($image->getResource(), IMG_FILTER_NEGATE);
    }
}

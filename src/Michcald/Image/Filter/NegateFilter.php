<?php

namespace Michcald\Image\Filter;

/**
 * Invert image colors
 * 
 * @author Michael Caldera <michcald@gmail.com>
 */
class NegateFilter extends AbstractFilter
{
    public function filter(\Michcald\Image $image)
    {
        imagefilter($image->getResource(), IMG_FILTER_NEGATE);
    }
}

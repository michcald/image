<?php

namespace Michcald\Image\Filter;

/**
 * Convert an image in grayscale
 * 
 * @author Michael Caldera <michcald@gmail.com>
 */
class GrayscaleFilter extends AbstractFilter
{
    public function filter(\Michcald\Image $image)
    {
        imagefilter($image->getResource(), IMG_FILTER_GRAYSCALE);
    }
}

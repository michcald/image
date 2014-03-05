<?php

namespace Michcald\Image\Filter;

use Michcald\Image\Filter;

/**
 * Convert an image in grayscale
 * 
 * @author Michael Caldera <michcald@gmail.com>
 */
class Grayscale extends Filter
{
    public function filter(\Michcald\Image $image)
    {
        imagefilter($image->getResource(), IMG_FILTER_GRAYSCALE);
    }
}

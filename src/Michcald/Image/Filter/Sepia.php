<?php

namespace Michcald\Image\Filter;

use Michcald\Image\Filter;

/**
 * @author Michael Caldera <michcald@gmail.com>
 */
class Sepia extends Filter
{
    public function filter(\Michcald\Image $image)
    {
        imagefilter($image->getResource(), IMG_FILTER_GRAYSCALE);
        imagefilter($image->getResource(), IMG_FILTER_COLORIZE, 90, 60, 30);
    }
}

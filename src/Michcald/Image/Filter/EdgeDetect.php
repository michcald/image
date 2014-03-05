<?php

namespace Michcald\Image\Filter;

use Michcald\Image\Filter;

/**
 * @author Michael Caldera <michcald@gmail.com>
 */
class EdgeDetect extends Filter
{
    public function filter(\Michcald\Image $image)
    {
        imagefilter($image->getResource(), IMG_FILTER_EDGEDETECT);
    }
}

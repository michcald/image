<?php

namespace Michcald\Image\Filter;

/**
 * @author Michael Caldera <michcald@gmail.com>
 */
class EdgeDetectFilter extends AbstractFilter
{
    public function filter(\Michcald\Image $image)
    {
        imagefilter($image->getResource(), IMG_FILTER_EDGEDETECT);
    }
}

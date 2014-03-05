<?php

namespace Michcald\Image\Filter;

/**
 * @author Michael Caldera <michcald@gmail.com>
 */
class EmbossFilter extends AbstractFilter
{
    public function filter(\Michcald\Image $image)
    {
        imagefilter($image->getResource(), IMG_FILTER_EMBOSS);
    }
}

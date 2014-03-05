<?php

namespace Michcald\Image\Filter;

abstract class AbstractFilter
{
    abstract public function filter(\Michcald\Image $image);
}
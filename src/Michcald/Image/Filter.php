<?php

namespace Michcald\Image;

abstract class Filter
{
    abstract public function filter(\Michcald\Image $image);
}
<?php

namespace Michcald\Image;

abstract class Transformer
{
    abstract public function transform(\Michcald\Image $image);
}
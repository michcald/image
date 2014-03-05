<?php

// Create a sketch effect
    public function sketch($level = 1)
    {
        for($i = 0;$i < $level;$i++ ) {
            imagefilter($this->image, IMG_FILTER_MEAN_REMOVAL);
        }
        return $this;
    }
<?php

namespace Michcald\Color;

class HexadecimalColor extends AbstractColor
{
    private $colorCode;
    
    public function __construct($colorCode)
    {
        if (!self::validate($colorCode)) {
            throw new \Exception('Invalid hexadecimal color: '. $colorCode);
        }
        
        $this->colorCode = $colorCode;
    }
    
    public static function validate($colorCode)
    {
        return preg_match('/^#[a-f0-9]{6}$/i', $colorCode);
    }

    public function getRed()
    {
        $red = substr($this->colorCode, 0, 2);
        
        return hexdec($red);
    }
    
    public function getGreen()
    {
        $green = substr($this->colorCode, 2, 2);
        
        return hexdec($green);
    }
    
    public function getBlue()
    {
        $blue = substr($this->colorCode, 4, 2);
        
        return hexdec($blue);
    }
}

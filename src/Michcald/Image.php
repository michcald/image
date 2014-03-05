<?php

namespace Michcald;

// Require GD library
if(!extension_loaded('gd')) {
    throw new \Exception('Required extension GD is not loaded!');
}

/**
 * Michcald\Image
 * 
 * @author Michael Caldera <michcald@gmail.com>
 */
class Image
{
    private $src = null;
    
    private $image = null;
    
    private $filters = array();
    
    public function __construct($src)
    {
        $this->src = $src;
        $info = getimagesize($src);
        
        switch($info['mime'])
        {
            case 'image/gif':
                $this->image = imagecreatefromgif($src);
		break;
            case 'image/jpeg':
                $this->image = imagecreatefromjpeg($src);
		break;
            case 'image/png':
                $this->image = imagecreatefrompng($src);
		break;
            default:
                throw new Exception('Mein_Image::__construct() Unsupported image type');
        }
    }
    
    public function setResource($resource)
    {
        $this->image = $resource;
        
        return $this;
    }
    
    public function getResource()
    {
        return $this->image;
    }
    
    public function getWidth()
    {
        return imagesx($this->image);
    }
    
    public function getHeight()
    {
        return imagesy($this->image);
    }
    
    public function getType()
    {
        $info = getimagesize($this->src);
        return $info['mime'];
    }
    
    public function applyFilter(Image\Filter\AbstractFilter $filter)
    {
        $filter->filter($this);
        
        return $this;
    }

    public function save($filename, $type = 'image/jpeg', $quality = null)
    {
        switch($type)
        {
            case 'image/gif':
                imagegif($this->image, $filename);
		break;
            case 'image/jpg':
            case 'image/jpeg':
                if($quality == null) {
                    $quality = 85;
                } else if($quality < 0) {
                    $quality = 0;
                } else if($quality > 100) {
                    $quality = 100;
                }
		imagejpeg($this->image, $filename, $quality);
		break;
            case 'image/png':
                if($quality == null) {
                    $quality = 9;
                } else if($quality > 9) {
                    $quality = 9;
                } else if($quality < 1) {
                    $quality = 0;
                }
		imagepng($this->image, $filename, $quality);
                break;
            default:
                // Unsupported image type
                throw new Exception('Unsupported image type');
		#return false;
                break;
        }
        
        return $this;
    }

    


    

    
}

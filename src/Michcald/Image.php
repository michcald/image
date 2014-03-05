<?php

namespace Michcald;

/**
 * Michcald\Image
 * 
 * @author Michael Caldera <michcald@gmail.com>
 */
class Image
{
    const TYPE_JPEG = 'image/jpeg';
    
    const TYPE_JPG = 'image/jpg';
    
    const TYPE_GIF = 'image/gif';
    
    const TYPE_PNG = 'image/png';
    
    private $type;
    
    private $image = null;
    
    public function __construct($src)
    {
        $info = getimagesize($src);
        
        $this->type = $info['mime'];
        
        switch($this->type) {
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
                throw new \Exception('Unsupported image type');
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
        return $this->type;
    }
    
    public function applyFilter(Image\Filter $filter)
    {
        $filter->filter($this);
        
        return $this;
    }
    
    public function applyTransformer(Image\Transformer $transformer)
    {
        $transformer->transform($this);
        
        return $this;
    }
    
    public function saveAsJpeg($filename, $quality = 85)
    {
        if($quality == null) {
            $quality = 85;
        } else if($quality < 0) {
            $quality = 0;
        } else if($quality > 100) {
            $quality = 100;
        }
        
        imagejpeg($this->image, $filename, $quality);
    }
    
    public function saveAsGif($filename)
    {
        imagegif($this->image, $filename);
    }
    
    public function saveAsPng($filename, $quality = 85)
    {
        $quality = (int)($quality/10);
        
        if($quality > 9) {
            $quality = 9;
        } else if($quality < 1) {
            $quality = 0;
        }
        
        imagepng($this->image, $filename, $quality);
    }
    
}

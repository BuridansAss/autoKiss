<?php


namespace AutoKiss\Statics\Tools;


use Imagick;
use ImagickException;

class Image
{
    /**
     * @var Imagick
     */
    private $picture;

    /**
     * Image constructor.
     * @param $path
     * @throws ImagickException
     */
    public function __construct($path)
    {
        $this->picture = new Imagick($path);
    }

    /**
     * @return int
     */
    public function getWidth() : int
    {
        return $this->picture->getImageWidth();
    }

    /**
     * @return int
     */
    public function getHeight() : int
    {
        return $this->picture->getImageHeight();
    }

    /**
     * @return Imagick
     */
    public function getPicture() : Imagick
    {
        return $this->picture;
    }

    /**
     * @param $width
     * @param $height
     */
    public function setSize($width, $height) : void
    {
        $this->picture->thumbnailImage($width, $height);
    }
}
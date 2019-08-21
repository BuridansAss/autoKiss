<?php


namespace Tool\Images;


use Imagick;
use ImagickException;

class Image
{
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
    public function getWidth()
    {
        return $this->picture->getImageWidth();
    }

    /**
     * @return int
     */
    public function getHeight()
    {
        return $this->picture->getImageHeight();
    }

    /**
     * @return Imagick
     */
    public function getPicture()
    {
        return $this->picture;
    }
}
<?php


namespace Tool\Images;


use Imagick;
use ImagickException;
use ImagickPixel;

class Canvas
{

    /**
     * @var Imagick
     */
    private $canvas;

    /**
     * Canvas constructor.
     * @param $width
     * @param $height
     * @throws ImagickException
     */
    public function __construct($width, $height)
    {
        $this->canvas = new Imagick();
        $this->canvas->newImage($width, $height, new ImagickPixel('rgba(0, 0, 0, 0)'));
        $this->canvas->setImageFormat('png');
    }

    /**
     * @param $path
     */
    public function save($path)
    {
        file_put_contents($path, $this->canvas);
    }

    /**
     * @return Imagick
     */
    public function getCanvas()
    {
        return $this->canvas;
    }

    /**
     * @param Image $image
     * @param $x
     * @param $y
     * @return bool
     */
    public function draw(Image $image, $x, $y)
    {
        return $this->canvas->compositeImage($image->getPicture(), Imagick::COMPOSITE_ADD, $x, $y);
    }

}
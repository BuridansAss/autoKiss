<?php


namespace Tool\PictureCreator;


use Imagick;
use ImagickException;
use ImagickPixel;

class Canvas
{

    //TODO need clear


    /**
     * @var Imagick
     */
    private $canvas;

    /**
     * Canvas constructor.
     * @throws ImagickException
     */
    public function __construct()
    {
        $this->canvas = new Imagick();
    }

    /**
     * @param $width
     * @param $height
     */
    public function createEmptyCanvas($width, $height)
    {
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
     * @return $this
     */
    public function draw(Image $image, $x, $y)
    {
        $this->canvas->compositeImage($image->getPicture(), Imagick::COMPOSITE_ADD, $x, $y);
        return $this;
    }
}
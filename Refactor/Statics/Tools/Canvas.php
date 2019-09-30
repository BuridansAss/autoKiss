<?php


namespace AutoKiss\Statics\Tools;


use AutoKiss\Statics\Abstracts\Nominal;
use Imagick;
use ImagickException;
use ImagickPixel;


class Canvas
{
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
     * @return $this
     */
    public function createEmptyCanvas($width, $height) : Canvas
    {
        $this->canvas->newImage($width, $height, new ImagickPixel('rgba(0, 0, 0, 0)'));
        $this->canvas->setImageFormat('png');
        return $this;
    }

    /**
     * @param Image $image
     * @param $x
     * @param $y
     * @return Canvas
     */
    public function draw(Image $image, $x, $y) : Canvas
    {
        $this->canvas->compositeImage($image->getPicture(), Imagick::COMPOSITE_ADD, $x, $y);
        return $this;
    }

    /**
     * @param Nominal $item
     */
    public function save(Nominal $item) : void
    {
        file_put_contents($item->nominalPath(), $this->canvas);
    }

    /**
     * @return $this
     * @throws ImagickException
     */
    public function clear()
    {
        unset($this->canvas);
        $this->canvas = new Imagick();

        return $this;
    }

}
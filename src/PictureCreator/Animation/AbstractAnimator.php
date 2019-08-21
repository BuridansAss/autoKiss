<?php


namespace Tool\PictureCreator\Animation;


use ImagickException;
use Tool\PictureCreator\Canvas;
use Tool\PictureCreator\Image;

abstract class AbstractAnimator
{
    /**
     * @var Canvas
     */
    protected $canvas;

    /**
     * @var
     */
    protected $path;

    const FEMALE = 'female';
    const MALE   = 'male';
    const ALL    = 'all';

    const REFERENCE_WIDTH = 0;
    const REFERENCE_HEIGHT = 0;

    /**
     * AbstractAnimator constructor.
     * @param $path
     * @throws ImagickException
     */
    public function __construct($path)
    {
        $this->canvas = new Canvas();
        $this->path = $path;
    }

    /**
     * @param $picturePaths
     * @throws ImagickException
     */
    public function sizeInfo($picturePaths)
    {
        foreach ($picturePaths as $path) {
            $image = new Image($path);

            $width = $image->getWidth();
            $height = $image->getHeight();

            if ($width !== static::REFERENCE_WIDTH | $height !== static::REFERENCE_HEIGHT) {
                throw new \Exception(
                    "$width x $height а должно быть "
                    . static::REFERENCE_WIDTH . ' x ' . static::REFERENCE_HEIGHT);
            }

            unset($image);
        }
    }
}
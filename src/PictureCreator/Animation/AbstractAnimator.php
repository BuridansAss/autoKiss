<?php


namespace Tool\PictureCreator\Animation;


use Exception;
use ImagickException;
use Tool\PictureCreator\Canvas;
use Tool\PictureCreator\Image;
use Tool\Utils;

abstract class AbstractAnimator
{
    const TYPE_UNI_SEX       = 0;
    const TYPE_DIFFERENT_SEX = 1;

    const ALL_CLASS = 'All';
    const MALE_CLASS = 'Male';
    const FEMALE_CLASS = 'Female';

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
     * @throws Exception
     */
    protected function sizeInfo($picturePaths)
    {
        foreach ($picturePaths as $path) {
            $image = new Image($path);

            $width = $image->getWidth();
            $height = $image->getHeight();

            if ($width !== static::REFERENCE_WIDTH | $height !== static::REFERENCE_HEIGHT) {
                throw new Exception(
                    "$width x $height а должно быть "
                    . static::REFERENCE_WIDTH . ' x ' . static::REFERENCE_HEIGHT);
            }

            unset($image);
        }
    }

    /**
     * @return int
     */
    protected function getType()
    {
        $dir = Utils::scanDir($this->path);

        if (in_array('128', $dir)) {
            return self::TYPE_UNI_SEX;
        }

        return self::TYPE_DIFFERENT_SEX;
    }

    abstract public function animate();
}
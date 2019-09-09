<?php


namespace Tool\PictureCreator\Animation\Hat;


use Exception;
use ImagickException;
use Tool\PictureCreator\Animation\TraitFrameByFrameAnimation;
use Tool\PictureCreator\Canvas;
use Tool\PictureCreator\Image;
use Tool\Utils;

class Gender
{
    use TraitFrameByFrameAnimation;

    const REFERENCE_HEIGHT = 75;
    const REFERENCE_WIDTH  = 75;

    //т.к в Utils применяется array_diff то нумерация элементов не с нуля начинается
    const FIRST_IMAGE      = 2;

    /**
     * @var string
     */
    protected $active;

    /**
     * @var string
     */
    protected $path;

    /**
     * Gender constructor.
     * @param $path
     */
    public function __construct($path)
    {
        $this->path = $path;
    }

    /**
     * @return Canvas
     * @throws Exception
     */
    public function animate()
    {
        $height = self::REFERENCE_HEIGHT;

        $images = $this->getArrayImages($this->active);

        $canvas = new Canvas();
        $canvas->createEmptyCanvas(self::$width, $height);

        $countWidth = 0;
        $countHeight = 0;

        foreach ($images as $image) {
            $canvas->draw($image, $countWidth, $countHeight);
            $countWidth += self::REFERENCE_WIDTH;

        }

        unset($images);
        self::$width = 0;

        return $canvas;
    }

    /**
     * @throws ImagickException
     */
    public function getStaticImage()
    {
        $imagesPath = Utils::scanDirFullPath($this->active);
        $firstImagePath = $imagesPath[self::FIRST_IMAGE];
        $image = new Image($firstImagePath);

        $canvas = new Canvas();
        $canvas->createEmptyCanvas(self::REFERENCE_WIDTH, self::REFERENCE_HEIGHT);
        $canvas->draw($image, 0, 0);

        unset($image);

        return $canvas;
    }
}
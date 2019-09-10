<?php


namespace Tool\PictureCreator\Animation\Icon;


use ImagickException;
use Tool\PictureCreator\Canvas;
use Tool\PictureCreator\Image;
use Tool\Utils;

class Gender
{
    /**
     * @var string
     */
    protected $imagesPath;

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
     * @param $size
     * @return Canvas
     * @throws ImagickException
     */
    public function getStaticImageBySize($size)
    {
        $files = Utils::scanDirFullPath($this->path);

        foreach ($files as $file) {
            if (!strpos($file, '.png')) {
                continue;
            }

            $image = new Image($file);
            if ($image->getWidth() !== $size) {
                unset($image);
                continue;
            }

            if (isset($image)) {

                $canvas = new Canvas();
                $canvas->createEmptyCanvas($size, $size);
                $canvas->draw($image, 0, 0);

                unset($image);

                return $canvas;
            }
        }

        return new Canvas();
    }
}
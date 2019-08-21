<?php


namespace Tool\PictureCreator\Animation\Frame;

use Exception;
use Tool\PictureCreator\Canvas;
use Tool\PictureCreator\Image;
use Tool\Utils;

class Gender
{
    const ACTIVE_FOLDER  = 'act/';
    const PASSIVE_FOLDER = 'still/';

    const REFERENCE_WIDTH = 128;
    const REFERENCE_HEIGHT = 152;

    protected $active;

    protected $passive;

    protected $path;

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
        $width = 0;

        $height = self::REFERENCE_HEIGHT * 2;

        $images = [];

        $imagesActivePath = Utils::scanDirFullPath($this->active);

        $imagesPassivePath = Utils::scanDirFullPath($this->passive);

        if (count($imagesActivePath) !== count($imagesPassivePath)) {
            throw  new Exception('Разное количество картинок ');
        }

        foreach ($imagesPassivePath as $item) {
            $image = new Image($item);

            if ($image->getWidth() !== self::REFERENCE_WIDTH || $image->getHeight() !== self::REFERENCE_HEIGHT) {
                throw new Exception('неверный размер ' . $item);
            }

            $width += $image->getWidth();

            $images[] = $image;
        }

        $canvas = new Canvas();
        $canvas->createEmptyCanvas($width, $height);

        $countWidth = 0;
        $countHeight = 0;

        foreach ($images as $image) {
            $canvas->draw($image, $countWidth, $countHeight);
            $countWidth += self::REFERENCE_WIDTH;

        }

        unset($images);

        $images = [];

        foreach ($imagesActivePath as $item) {
            $image = new Image($item);

            $images[] = $image;
        }

        $countWidth = 0;
        $countHeight = self::REFERENCE_HEIGHT;
        $i = 0;

        foreach ($images as $image) {
            $canvas->draw($image, $countWidth, $countHeight);
            $countWidth += self::REFERENCE_WIDTH;
        }

        return $canvas;
    }
}
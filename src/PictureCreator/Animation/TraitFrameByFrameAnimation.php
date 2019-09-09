<?php


namespace Tool\PictureCreator\Animation;


use Exception;
use Tool\PictureCreator\Image;
use Tool\Utils;

trait TraitFrameByFrameAnimation
{
    /**
     * @var int
     */
    private static $width;

    /**
     * @param $pathToFolder
     * @return array
     * @throws Exception
     */
    private function getArrayImages($pathToFolder)
    {
        $images = [];

        $imagesInFolder = Utils::scanDirFullPath($pathToFolder);

        foreach ($imagesInFolder as $item) {
            $image = new Image($item);

            if ($image->getWidth() !== self::REFERENCE_WIDTH || $image->getHeight() !== self::REFERENCE_HEIGHT) {
                throw new Exception('неверный размер ' . $item);
            }

            self::$width += $image->getWidth();

            $images[] = $image;
        }

        return $images;
    }
}
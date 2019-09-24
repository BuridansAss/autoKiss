<?php


namespace Tool\PictureCreator\Mobile;


use ImagickException;
use Tool\PictureCreator\Canvas;
use Tool\PictureCreator\Image;

class Resolution
{
    const RESOLUTION_NAME_1X      = '1x';
    const RESOLUTION_NAME_2X      = '2x';
    const RESOLUTION_NAME_3X      = '3x';
    const RESOLUTION_NAME_HDPI    = 'hdpi';
    const RESOLUTION_NAME_LDPI    = 'ldpi';
    const RESOLUTION_NAME_MDPI    = 'mdpi';
    const RESOLUTION_NAME_XHDPI   = 'xhdpi';
    const RESOLUTION_NAME_XXHDPI  = 'xxhdpi';
    const RESOLUTION_NAME_XXXHDPI = 'xxxhdpi';

    const COEFFICIENT_XXXHDPI = 1;
    const COEFFICIENT_XXHDPI  = 0.75;
    const COEFFICIENT_XHDPI   = 0.5;
    const COEFFICIENT_MDPI    = 0.25;
    const COEFFICIENT_LDPI    = 0.185;
    const COEFFICIENT_HDPI    = 0.375;
    const COEFFICIENT_3X      = 0.75;
    const COEFFICIENT_2X      = 0.5;
    const COEFFICIENT_1X      = 0.25;

    /**
     * @var array
     */
    public static $coefficientMap = [
        self::RESOLUTION_NAME_1X      => self::COEFFICIENT_XXXHDPI,
        self::RESOLUTION_NAME_2X      => self::COEFFICIENT_XXHDPI,
        self::RESOLUTION_NAME_3X      => self::COEFFICIENT_XHDPI,
        self::RESOLUTION_NAME_HDPI    => self::COEFFICIENT_MDPI,
        self::RESOLUTION_NAME_LDPI    => self::COEFFICIENT_LDPI,
        self::RESOLUTION_NAME_MDPI    => self::COEFFICIENT_HDPI,
        self::RESOLUTION_NAME_XHDPI   => self::COEFFICIENT_3X,
        self::RESOLUTION_NAME_XXHDPI  => self::COEFFICIENT_2X,
        self::RESOLUTION_NAME_XXXHDPI => self::COEFFICIENT_1X,
    ];

    /**
     * @param $path
     * @return Image
     * @throws ImagickException
     */
    private static function getImage($path)
    {
        return new Image($path);
    }

    /**
     * @param $path
     * @return array
     * @throws ImagickException
     */
    public static function createImagesForDiffResolutions($path) {
        $image  = self::getImage($path);

        $width  = $image->getWidth();
        $height = $image->getHeight();

        $canvases = [];

        foreach (self::$coefficientMap as $key => $coefficient) {
            $cloneImage = clone $image;
            $canvas = new Canvas();
            $canvas->createEmptyCanvas((int)($width * $coefficient), (int)($height * $coefficient));
            $cloneImage->setSize((int)($width * $coefficient), (int)($height * $coefficient));
            $canvas->draw($cloneImage, 0, 0);
            $canvases[$key] = $canvas;
            unset($cloneImage);
        }

        return $canvases;
    }
}
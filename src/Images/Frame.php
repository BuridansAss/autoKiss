<?php


namespace Tool\Images;

use Exception;
use ImagickException;
use Tool\Settings;
use Tool\Utils;

class Frame
{
    const FEMALE = 'fem';
    const MALE = 'man';
    const ALL  = 'all';

    const DIFF_SEX = 1;
    const UNI_SEX  = 2;

    const PASSIVE = '/still/';
    const ACTIVE = '/act/';

    const WIDTH = 128;
    const HEIGHT = 152;

    const OUTPUT_NAME_POSTFIX_MALE   = '_1_male.png';
    const OUTPUT_NAME_POSTFIX_FEMALE = '_1_female.png';
    const OUTPUT_NAME_POSTFIX_ALL    = '_1_all.png';

    /**
     * @var string
     */
    private $path;

    /**
     * Frame constructor.
     * @param $path
     */
    public function __construct($path)
    {
        $this->path = $path;
    }

    /**
     * @return int
     */
    private function getTypeOfFrame()
    {
        $dirs = Utils::scanDir($this->path);

        foreach ($dirs as $dir) {
            if ($dir === self::FEMALE || $dir === self::MALE) {
                return self::DIFF_SEX;
            }
        }

        return self::UNI_SEX;
    }

    /**
     * @param $pathActive
     * @param $pathPassive
     * @return Canvas
     * @throws ImagickException
     * @throws Exception
     */
    public function createAnimation($pathActive, $pathPassive)
    {
        $referenceWidth  = self::WIDTH;
        $referenceHeight = self::HEIGHT;

        $width = 0;

        //два ряда
        $height = $referenceHeight * 2;

        $images = [];

        $imagesActivePath = Utils::scanDirFullPath($pathActive);

        $imagesPassivePath = Utils::scanDirFullPath($pathPassive);

        if (count($imagesActivePath) !== count($imagesPassivePath)) {
            throw  new Exception('Разное количество картинок ' . self::PASSIVE . ' и ' . self::ACTIVE);
        }

        foreach ($imagesPassivePath as $item) {
            $image = new Image($item);

            if ($image->getWidth() !== $referenceWidth || $image->getHeight() !== $referenceHeight) {
                throw new Exception('неверный размер ' . $item);
            }

            $width += $image->getWidth();

            $images[] = $image;
        }

        $canvas = new Canvas($width, $height);

        $countWidth = 0;
        $countHeight = 0;
        $i = 0;

        foreach ($images as $image) {
            if ($canvas->draw($image, $countWidth, $countHeight)) {
                echo $i . PHP_EOL;
            };

            $countWidth += $referenceWidth;
            $i++;
        }

        unset($images);
        $images = [];

        foreach ($imagesActivePath as $item) {
            $image = new Image($item);
            
            $images[] = $image;
        }

        $countWidth = 0;
        $countHeight = $referenceHeight;
        $i = 0;

        foreach ($images as $image) {


            if ($canvas->draw($image, $countWidth, $countHeight)) {
                echo $i . PHP_EOL;
            };

            $countWidth += $referenceWidth;

            $i++;
        }

        return $canvas;
    }

    /**
     * @return array
     */
    public function getPathToPassive()
    {
        $path = $this->path;

        if ($this->getTypeOfFrame() === self::DIFF_SEX) {
            return [
                $path . self::FEMALE . '/' . self::WIDTH . self::PASSIVE,
                $path . self::MALE . '/' . self::WIDTH . self::PASSIVE,
            ];
        }

        return [$path . '/' . self::WIDTH . self::PASSIVE];
    }

    /**
     * @return array
     */
    public function getPathToActive()
    {
        $path = $this->path;

        if ($this->getTypeOfFrame() === self::DIFF_SEX) {
            return [
                $path . self::FEMALE . '/' . self::WIDTH . self::ACTIVE,
                $path . self::MALE . '/' . self::WIDTH . self::ACTIVE,
            ];
        }

        return [$path . '/' . self::WIDTH . self::ACTIVE];
    }

    /**
     * @param $sex
     * @return string
     * @throws \Exception
     */
    public function fileName($sex)
    {
        $id = Settings::getNextIdItem(Settings::FRAME);
        if (!is_dir(BUILD . 'static/game/images/collection/' ."$id/")) {
            mkdir(BUILD . 'static/game/images/collection/' . "$id/", 0777, true);
        }
        if ($sex === self::FEMALE) {
            return BUILD . 'static/game/images/collection/' ."$id/" . $id . self::OUTPUT_NAME_POSTFIX_FEMALE;
        }

        if ($sex === self::MALE) {
            return BUILD . 'static/game/images/collection/' ."$id/" . $id . self::OUTPUT_NAME_POSTFIX_MALE;
        }

        return BUILD . 'static/game/images/collection/' ."$id/" . $id . self::OUTPUT_NAME_POSTFIX_ALL;
    }

}
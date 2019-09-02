<?php


namespace Tool\PictureCreator\Namings;


use Exception;
use Tool\Settings;

class FrameNaming
{
    const ERROR = 'error';

    const POSTFIX_ALL    = '_1_all.png';
    const POSTFIX_MALE   = '_1_male.png';
    const POSTFIX_FEMALE = '_1_female.png';

    /**
     *  get frame id
     */
    private static function frameId()
    {
        try {
            return Settings::getNextIdItem(Settings::FRAME);
        } catch (Exception $e) {
            echo $e->getMessage();
            return self::ERROR;
        }
    }

    /**
     * @return string
     * @throws Exception
     */
    private static function createFrameFolder()
    {
        $frameId = self::frameId();

        if ($frameId === self::ERROR) {
            throw new Exception('что-то не так с id рамки');
        }

        if (!is_dir(FRAME_BUILD . $frameId) ) {
            mkdir(FRAME_BUILD . $frameId, 0777, true);
        }

        return FRAME_BUILD . $frameId . '/';
    }

    /**
     * @return string
     */
    public static function getAllFrameName()
    {
        try {
            $frameId = self::frameId();
            $path = self::createFrameFolder();

            return $path . $frameId . self::POSTFIX_ALL;
        } catch (Exception $e) {
            echo $e->getMessage();
            return self::ERROR;
        }
    }

    /**
     * @return string
     */
    public static function getMaleFrameName()
    {
        try {
            $frameId = self::frameId();
            $path = self::createFrameFolder();

            return $path . $frameId . self::POSTFIX_MALE;
        } catch (Exception $e) {
            echo $e->getMessage();
            return self::ERROR;
        }
    }

    /**
     * @return string
     */
    public static function getFemaleFrameName()
    {
        try {
            $frameId = self::frameId();
            $path = self::createFrameFolder();

            return $path . $frameId . self::POSTFIX_FEMALE;
        } catch (Exception $e) {
            echo $e->getMessage();
            return self::ERROR;
        }
    }
}
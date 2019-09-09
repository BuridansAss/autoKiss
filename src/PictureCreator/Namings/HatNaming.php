<?php


namespace Tool\PictureCreator\Namings;


use Exception;
use Tool\Settings;

class HatNaming
{
    const ERROR = 'error';

    const STATIC_POSTFIX = '_static';
    const MALE_POSTFIX = '_male';
    const FEMALE_POSTFIX = '_female';
    const ALL_POSTFIX = '_all';
    const PNG_POSTFIX = '.png';

    /**
     * @return mixed|string
     * @throws Exception
     */
    private static function hatId()
    {
        try {
            return Settings::getNextIdItem(Settings::HAT);
        } catch (Exception $e) {
            echo $e->getMessage();
            return self::ERROR;
        }
    }

    /**
     * @param bool $isStatic
     * @return string
     * @throws Exception
     */
    public static function getAllHatName($isStatic = false)
    {
        $hatId = self::hatId();

        if ($hatId === self::ERROR) {
            throw new Exception('что-то не так с id рамки');
        }

        if ($isStatic) {
            return HAT_BUILD . $hatId . self::ALL_POSTFIX . self::STATIC_POSTFIX . self::PNG_POSTFIX;
        }

        return HAT_BUILD . $hatId . self::ALL_POSTFIX . self::PNG_POSTFIX;
    }

    /**
     * @param bool $isStatic
     * @return string
     * @throws Exception
     */
    public static function getMaleHatName($isStatic = false)
    {
        $hatId = self::hatId();

        if ($hatId === self::ERROR) {
            throw new Exception('что-то не так с id рамки');
        }

        if ($isStatic) {
            return HAT_BUILD . $hatId . self::MALE_POSTFIX . self::STATIC_POSTFIX . self::PNG_POSTFIX;
        }

        return HAT_BUILD . $hatId . self::MALE_POSTFIX . self::PNG_POSTFIX;
    }

    /**
     * @param bool $isStatic
     * @return string
     * @throws Exception
     */
    public static function getFemaleHatName($isStatic = false)
    {
        $hatId = self::hatId();

        if ($hatId === self::ERROR) {
            throw new Exception('что-то не так с id рамки');
        }

        if ($isStatic) {
            return HAT_BUILD . $hatId . self::FEMALE_POSTFIX . self::STATIC_POSTFIX . self::PNG_POSTFIX;
        }

        return HAT_BUILD . $hatId . self::FEMALE_POSTFIX . self::PNG_POSTFIX;
    }
}
<?php


namespace Tool\PictureCreator\Namings;


use Exception;
use Tool\Settings;

class IconNaming
{
    const ERROR = 'error';

    const PNG_POSTFIX = '.png';

    const FOLDER_20 = '20/';
    const FOLDER_72 = '72/';

    const SIZE_20 = 20;
    const SIZE_72 = 72;

    /**
     * @var array
     */
    private static $sizeMap = [
        self::SIZE_20 => self::FOLDER_20,
        self::SIZE_72 => self::FOLDER_72,
    ];

    /**
     * @return mixed|string
     * @throws Exception
     */
    private static function iconId()
    {
        try {
            return Settings::getNextIdItem(Settings::ICON);
        } catch (Exception $e) {
            echo $e->getMessage();
            return self::ERROR;
        }
    }

    /**
     * @param $size
     * @return string
     * @throws Exception
     */
    public static function getIconName($size)
    {
        $iconId = self::iconId();

        if ($iconId === self::ERROR) {
            throw new Exception('что-то не так с id иконки');
        }

        if ($GLOBALS['isNeedInSource']) {
            return Settings::getIconsPathInSourceFolder(Settings::TYPE_IMAGES) . self::$sizeMap[$size] . $iconId . self::PNG_POSTFIX;
        }

        return ICON_BUILD . self::$sizeMap[$size] . $iconId . self::PNG_POSTFIX;
    }
}
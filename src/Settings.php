<?php


namespace Tool;


use Exception;

class Settings
{
    const FRAME  = 'frame';
    const HAT    = 'hat';
    const ICON   = 'icon';
    const IMAGES = 'images';

    const TYPE_IMAGES = 1;

    private static $mapTypes = [
        self::TYPE_IMAGES => self::IMAGES
    ];


    public static function getSettings()
    {
        $json = file_get_contents(ROOT . '/settings.json');

        return json_decode($json, 1);
    }

    /**
     * @param $json string
     */
    public static function setSettings($json)
    {
        file_put_contents(ROOT . '/settings.json', $json);
    }

    /**
     * @param $item
     * @return mixed
     * @throws Exception
     */
    public static function getNextIdItem($item)
    {
        $settings = self::getSettings();

        return $settings['nextSet'][$item];
    }


    /**
     * @param $item
     */
    public static function setNextIdItem($item)
    {
        $settings = self::getSettings();
        ++$settings['nextSet'][$item];
        $json = json_encode($settings);

        self::setSettings($json);
    }

    public static function getSourceFolder()
    {
        return self::getSettings()['sourceFolder'];
    }

    /**
     * @return int
     */
    public static function getNextGiftId()
    {
        $settings = self::getSettings();

        return $settings['nextGiftId'];
    }

    /**
     *  set next gift id
     */
    public static function setNextGiftId()
    {
        $settings = self::getSettings();
        ++$settings['nextGiftId'];
        $json = json_encode($settings);

        self::setSettings($json);
    }

    /**
     * @param $type
     * @return mixed
     * @throws Exception
     */
    private static function getStructFromSourceFolder($type)
    {
        if (isset(self::$mapTypes[$type])) {
            $settings = self::getSettings();
            return $settings['inSourceFolder'][self::$mapTypes[$type]];
        }

        throw new Exception('такой структуры несуществует ' . $type);
    }

    /**
     * @param $type
     * @return mixed
     * @throws Exception
     */
    public static function getIconsPathInSourceFolder($type)
    {
        $res = self::getStructFromSourceFolder($type);

        return self::getSourceFolder() . $res[self::ICON];
    }


    /**
     * @return mixed
     */
    public static function getNextEventId()
    {
        $settings = self::getSettings();

        return $settings['nextEventId'];
    }

    /**
     * set next event id
     */
    public static function setNextEventId()
    {
        $settings = self::getSettings();
        ++$settings['nextEventId'];
        $json = json_encode($settings);

        self::setSettings($json);
    }

    /**
     * @return string
     */
    public static function getStickersSource()
    {
        $settings = self::getSettings();

        return $settings['stickersSrc'];
    }

    /**
     * @return int
     */
    public static function getNextStickerId()
    {
        $settings = self::getSettings();

        return $settings['nextStickersId'];
    }

    /**
     * set next sticker id
     */
    public static function setNextStickerId()
    {
        $settings = self::getSettings();
        ++$settings['nextStickersId'];
        $json = json_encode($settings);

        self::setSettings($json);
    }
}
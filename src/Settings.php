<?php


namespace Tool;


use Exception;

class Settings
{
    const FRAME = 'frame';
    const HAT   = 'hat';
    const ICON  = 'icon';

    public static function getSettings()
    {
        $json = file_get_contents(ROOT . '/settings.json');

        return json_decode($json, 1);
    }

    public static function setSettings()
    {

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

        file_put_contents(ROOT . '/settings.json', $json);
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

        file_put_contents(ROOT . '/settings.json', $json);
    }
}
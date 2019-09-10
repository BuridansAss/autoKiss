<?php


namespace Tool;


use Exception;

class Path
{
    const ANIMATION_FOLDER = 'Animation/';
    const FRAME_FOLDER     = 'frame/';
    const HAT_FOLDER       = 'hat/';
    const ICON_FOLDER      = 'Icon/';

    const ITEM_HAT   = 1;
    const ITEM_FRAME = 2;
    const ITEM_ICON  = 3;

    private static $itemMap = [
        self::ITEM_FRAME => self::FRAME_FOLDER,
        self::ITEM_HAT   => self::HAT_FOLDER,
        self::ITEM_ICON  => self::ICON_FOLDER
    ];

    /**
     * @return array
     */
    private static function getSources()
    {
        return Utils::getOnlyDirs(SOURCE);
    }

    /**
     * @param $item
     * @return array
     * @throws Exception
     */
    public static function getSource($item)
    {
        $sources = self::getSources();
        $result = [];

        if (isset(self::$itemMap[$item])) {

            if ($item === self::ITEM_ICON) {
                foreach ($sources as $source) {
                    $pathToIcons = $source . self::ICON_FOLDER;
                    $result[$source] = $pathToIcons;
                }

                return $result;
            }

            foreach ($sources as $source) {
                $pathToAnimationFolder = $source . self::ANIMATION_FOLDER;
                try {
                    $pathToAnimationFolder = Utils::getOneDir($pathToAnimationFolder);
                    $pathToAnimation    = $pathToAnimationFolder . self::$itemMap[$item];
                    $result[$source]       = $pathToAnimation;
                } catch (Exception $exception) {
                    echo $exception->getMessage();
                    continue;
                }
            }

            return $result;
        } else {
            throw new Exception('такого item не существует: ' . $item);
        }
    }

    /**
     * @return array
     */
    public static function getGiftsSource()
    {
        $sources = self::getSources();
        $result = [];

        foreach ($sources as $source) {
            $haveDirs = Utils::getOnlyDirs($source);
            if (!empty($haveDirs)) {
                continue;
            }

            $result[] = $source;
        }

        return $result;
    }

    /**
     * @param $numberOfFolder
     * @return string
     */
    public static function getOldGiftFolder($numberOfFolder)
    {
        return OLD_GIFTS_SOURCE . $numberOfFolder . '/';
    }
}
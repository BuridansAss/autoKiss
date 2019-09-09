<?php


namespace Tool;


use Exception;

class Path
{
    const ANIMATION_FOLDER = 'Animation/';
    const FRAME_FOLDER     = 'frame/';
    const HAT_FOLDER       = 'hat/';

    const ITEM_HAT   = 1;
    const ITEM_FRAME = 2;

    private static $itemMap = [
        self::ITEM_FRAME => self::FRAME_FOLDER,
        self::ITEM_HAT   => self::HAT_FOLDER
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

            foreach ($sources as $source) {
                $pathToAnimationFolder = $source . self::ANIMATION_FOLDER;
                try {
                    $pathToAnimationFolder = Utils::getOneDir($pathToAnimationFolder);
                    $pathToHatAnimation    = $pathToAnimationFolder . self::$itemMap[$item];
                    $result[$source]       = $pathToHatAnimation;
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
}
<?php


namespace Tool\TMP;


use Tool\Path;
use Tool\Settings;
use Tool\Utils;

class StickersRename
{
    const FOLDER_80         = '80/';
    const FOLDER_200        = '200/';
    const FOLDER_MOBILE_REG = 'PNG_assets_200/';
    const FOLDER_MOBILE_BIG = 'PNG_assets_350/';

    /**
     * @param $path
     */
    public static function renameByPath($path)
    {
        $pathTo80  = $path . self::FOLDER_80;
        $pathTo200 = $path . self::FOLDER_200;
        $pathToMR  = $path . self::FOLDER_MOBILE_REG;
        $pathToMB  = $path . self::FOLDER_MOBILE_BIG;

        $images = Utils::scanDir($pathTo80);

        sort($images);

        foreach ($images as $image) {
            rename($pathTo80 . $image, $pathTo80. Settings::getNextStickerId() . '.png');
            echo 'rename: ' . $pathTo80 . $image . ' => ' . $pathTo80. Settings::getNextStickerId() . '.png' . PHP_EOL;
            rename($pathTo200 . $image, $pathTo200. Settings::getNextStickerId() . '.png');
            echo 'rename: ' . $pathTo200 . $image . ' => ' . $pathTo200. Settings::getNextStickerId() . '.png' . PHP_EOL;

            self::mobileResolutionRenameHandler($pathToMR, $image);
            self::mobileResolutionRenameHandler($pathToMB, $image);

            Settings::setNextStickerId();
            echo 'next sticker is: ' . Settings::getNextStickerId() . PHP_EOL;
        }

    }

    /**
     * @param $path
     * @param $imageCurrentName
     */
    private static function mobileResolutionRenameHandler($path, $imageCurrentName)
    {
        $mobileResolutionDirs = Utils::scanDirFullPath($path);

        foreach ($mobileResolutionDirs as $dir) {
            rename($dir . $imageCurrentName, $dir . Settings::getNextStickerId() . '.png');

            echo 'rename: ' . $dir . $imageCurrentName . ' => ' . $dir . Settings::getNextStickerId() . '.png' . PHP_EOL;
        }
    }
}
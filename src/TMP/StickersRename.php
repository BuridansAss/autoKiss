<?php


namespace Tool\TMP;


use Tool\Path;
use Tool\Utils;

class StickersRename
{
    const FOLDER_80         = '80/';
    const FOLDER_200        = '200/';
    const FOLDER_MOBILE_REG = 'PNG_assets_200/';
    const FOLDER_MOBILE_BIG = 'PNG_assets_350/';

    public static function renameByPath($path)
    {
        $pathTo80  = $path . self::FOLDER_80;
        $pathTo200 = $path . self::FOLDER_200;
        $pathToMR  = $path . self::FOLDER_MOBILE_REG;
        $pathToMB  = $path . self::FOLDER_MOBILE_BIG;

        $images = Utils::scanDir($pathTo80);

        sort($images);

       foreach ($images as $image) {

       }

        return $images;
    }
}
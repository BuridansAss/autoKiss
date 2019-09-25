<?php


namespace Tool;


use Tool\TMP\ChestStatic;
use Tool\TMP\StickersRename;

class App
{
    const NEXT_FRAME = '-nextFrame';
    const NEXT_HAT   = '-nextHat';
    const NEXT_ICON  = '-nextIcon';
    const NEXT_SET   = '-nextSet';

    private static $argv;

    public static function Run()
    {
        //self::renameStickers();
        try {
            ChestStatic::create('/home/evgen/my_prj/kiss-regular-tasks-maker/source/chests/');
        } catch (\ImagickException $e) {
            $e->getMessage();
        }
    }


    public static function renameStickers()
    {
        $stickersSrc = Utils::scanDirFullPath(Settings::getStickersSource());

        foreach ($stickersSrc as $lineStickers) {
            StickersRename::renameByPath($lineStickers);
        }
    }
}
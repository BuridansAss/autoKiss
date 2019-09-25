<?php


namespace Tool;


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
        self::renameStickers();
    }


    public static function renameStickers()
    {
        $stickersSrc = Utils::scanDirFullPath(Settings::getStickersSource());

        foreach ($stickersSrc as $lineStickers) {
            StickersRename::renameByPath($lineStickers);
        }
    }
}
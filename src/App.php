<?php


namespace Tool;


class App
{
    const NEXT_FRAME = '-nextFrame';
    const NEXT_HAT   = '-nextHat';
    const NEXT_ICON  = '-nextIcon';
    const NEXT_SET   = '-nextSet';

    private static $argv;

    public static function Run()
    {
        global $argv;
        self::$argv = $argv;

        $command = self::$argv[1];
    }
}
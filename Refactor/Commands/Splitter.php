<?php


namespace AutoKiss\Commands;


class Splitter
{
    /**
     * @var array
     */
    private static $cliArgs;


    public static function split()
    {
        echo print_r(self::$cliArgs);
    }

    /**
     * @param $command array
     */
    public static function setCliArgs($command) : void
    {
        self::$cliArgs = $command;
    }
}
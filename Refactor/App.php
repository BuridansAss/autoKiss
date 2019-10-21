<?php


namespace AutoKiss;


use AutoKiss\Commands\CommandsBuilder;
use AutoKiss\Commands\Splitter;
use AutoKiss\Notifications\ConsolePrinter;
use Exception;

class App
{
    /**
     * @param $argv
     */
    public static function run($argv)
    {
        self::splitAndHandle($argv);
    }

    /**
     * @param $argv
     */
    private static function splitAndHandle($argv)
    {
        Splitter::setCliArgs($argv);
        Splitter::split();
    }
}
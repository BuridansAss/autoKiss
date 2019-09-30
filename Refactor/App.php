<?php


namespace AutoKiss;


use AutoKiss\Commands\CommandsBuilder;
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
        unset($argv[0]);

        foreach ($argv as $arg) {
            $arg = explode("=", $arg);

            $command = $arg[0];
            $params  = explode(':', $arg[1]);

            try {
                $commandObj = CommandsBuilder::build($command, $params);
                $commandObj->handle();
            } catch (Exception $e) {
                ConsolePrinter::exceptionExitFromApp($e->getMessage());
            }

        }
    }
}
<?php


namespace AutoKiss;


use AutoKiss\Notifications\ConsolePrinter;
use AutoKiss\Statics\StaticsFactory;

class App
{
    //;42
    public static function run($argv)
    {
        $sf = StaticsFactory::createFactory('icon');
    }
}
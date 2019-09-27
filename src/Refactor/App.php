<?php


namespace AutoKiss;


use AutoKiss\Notifications\ConsolePrinter;

class App
{
    //;42
    public static function run($argv)
    {
        $n = new ConsolePrinter();

        $n->badMessage('hui');
        $n->goodMessage('hui');
        $n->neutralMessage('hui');
    }
}
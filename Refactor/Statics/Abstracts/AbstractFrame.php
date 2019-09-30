<?php


namespace AutoKiss\Statics\Abstracts;


use AutoKiss\Notifications\ConsolePrinter;
use AutoKiss\SourceDir;
use AutoKiss\Utils;
use \Exception;

abstract class AbstractFrame extends Gender
{

    protected $frameDirs;

    protected function __construct()
    {
        $this->frameDirs = (new SourceDir())->getOnlyFrameDirs();
    }

    /**
     * @param null $path
     * @return string
     * @throws Exception
     */
    protected function findOutGender($path = null): string
    {
        ConsolePrinter::staticSeparator();
        ConsolePrinter::staticInfoMessage(__CLASS__ . ' -> findOutGender');
        ConsolePrinter::staticSeparator();
        if ($path !== null) {
            $dirs = Utils::scanDir($path);

            if (in_array('fem', $dirs) && in_array('man', $dirs)) {
                ConsolePrinter::staticGoodMessage($path . ' frame have sex: ' . Gender::GETEROSEX_NAME);
                return Gender::GETEROSEX;
            }

            ConsolePrinter::staticGoodMessage($path . ' frame have sex: ' . Gender::UNISEX_NAME);
            return Gender::UNISEX;
        }

        throw new Exception('param $path is null');
    }

}
<?php


namespace AutoKiss;


use AutoKiss\Notifications\ConsolePrinter;

class SourceDir
{
    const ANIMATION_DIR = 'Animation/';

    /**
     * @var array
     */
    private $paths;

    /**
     * SourceDir constructor.
     */
    public function __construct()
    {
        $this->paths = Utils::getOnlyDirs(Manifest::getSource());
        $this->sourceStruct();
    }

    /**
     * @return void
     * handler пробегается по source и определеяет где сет где подарки, где что
     */
    private function sourceStruct() : void
    {
        $set = 0;
        $result = [];
        foreach ($this->paths as &$path) {
            $dirs = Utils::getOnlyDirs($path);

            //должна быть папка Animation/ и Icon/ тогда он поймет что это сет
            if (in_array($path . self::ANIMATION_DIR, $dirs) && in_array($path.'Icon/', $dirs)) {
                $newKey = 'set_' . $set;
                $result[$newKey] = $path;
                $set++;
                continue;
            }

            $result[] = $path;
        }

        $this->paths = $result;
    }

    /**
     * если имя ключа начинается с set то запишем в массив значение и вернем этот массив
     * @return array
     */
    private function getOnlySetsDirs() : array
    {
        $result = [];

        foreach ($this->paths as $key => $path) {
            if (substr($key, 0, 3)) {
                $result[] = $path;
            }
        }

        return $result;
    }

    /**
     * получаем папки с рамками
     * @return array
     */
    public function getOnlyFrameDirs()
    {
        ConsolePrinter::staticSeparator();
        ConsolePrinter::staticInfoMessage(__CLASS__  . ' -> getOnlyFrameDirs');
        ConsolePrinter::staticSeparator();

        $result = [];
        $setsPaths = $this->getOnlySetsDirs();

        foreach ($setsPaths as $path) {
            $animationDir = $path . self::ANIMATION_DIR;
            $dirsInAnimation = Utils::getOnlyDirs($animationDir);

            if (!is_dir($animationDir)) {
                ConsolePrinter::staticBadMessage($animationDir . ' is not a dir');
                continue;
            }

            if (count($dirsInAnimation) !== 1) {
                ConsolePrinter::staticBadMessage($animationDir . ' have more than one dir');
                continue;
            }

            $dirWithRes = array_values($dirsInAnimation)[0] . 'frame/';

            if (!is_dir($dirWithRes)) {
                ConsolePrinter::staticBadMessage($dirWithRes . ' doesnt exist');
                continue;
            }

            ConsolePrinter::staticGoodMessage($dirWithRes . ' add in frame resources');

            $result[] = $dirWithRes;
        }

        return $result;
    }
}
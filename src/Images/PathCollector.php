<?php

namespace Tool\Images;

use Exception;
use Tool\Utils;

class PathCollector
{
    const ANIMATION_FOLDER = 'Animation/';
    const FRAME            = 'frame/';
    const HAT              = 'hat/';
    const ICON             = 'Icon/';
    const ERROR            = 'error';

    private $sources;

    /**
     * PathCollector constructor.
     */
    public function __construct()
    {
        $this->sources = Utils::scanDirFullPath(SOURCE);
    }

    /**
     * @param $path
     * @return mixed
     * @throws Exception
     */
    private function pathToImages($path)
    {
        if (!is_dir($path)) {
            throw new Exception($path . ' не папка');
        }

        $animation = $path . self::ANIMATION_FOLDER;
        $dirs = Utils::getOnlyDirs($animation);

        return array_shift($dirs);
    }

    /**
     * @param $path
     * @return string
     */
    public function pathToFrameImages($path)
    {
        try {
            return $this->pathToImages($path) . self::FRAME;
        } catch (Exception $e) {
            return self::ERROR;
        }
    }

    /**
     * @param $path
     * @return string
     */
    public function pathToHatImages($path)
    {
        try {
            return $this->pathToImages($path) . self::HAT;
        } catch (Exception $e) {
            return self::ERROR;
        }
    }

    /**
     * @param $path
     * @return string
     * @throws Exception
     */
    public function pathToIconImages($path)
    {
        if (!is_dir($path)) {
            throw new Exception($path . ' не папка');
        }

        return $path . self::ICON;
    }

    public function getSources()
    {
        return $this->sources;
    }
}
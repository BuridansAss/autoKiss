<?php


namespace Tool;


use Exception;

class Path
{
    /**
     * @return array
     */
    public static function getSources()
    {
        return Utils::getOnlyDirs(SOURCE);
    }

    /**
     * @return array
     */
    public static function getFramesSources()
    {
        $sources = self::getSources();
        $result = [];

        foreach ($sources as $source) {
            $pathToAnimationFolder = $source . 'Animation/';
            try {
                $pathToAnimationFolder = Utils::getOneDir($pathToAnimationFolder);
                $pathToFrameAnimation  = $pathToAnimationFolder . 'frame/';
                $result[$source] = $pathToFrameAnimation;
            }
            catch (Exception $exception) {
                echo $exception->getMessage();
                continue;
            }
        }

        return $result;
    }
}
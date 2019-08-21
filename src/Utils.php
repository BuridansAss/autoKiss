<?php


namespace Tool;


class Utils
{
    /**
     * @param $path
     * @return array
     */
    public static function scanDir($path)
    {
        return array_diff(scandir($path), ['.', '..']);
    }

    /**
     * @param $path
     * @return array
     */
    public static function scanDirFullPath($path)
    {
        $array = self::scanDir($path);

        foreach ($array as &$element) {
            $element = $path . $element;

            if (is_dir($element)) {
                $element .= '/';
            }
        }

        unset($element);

        return $array;
    }

    /**
     * @param $path
     * @return array
     */
    public static function getOnlyDirs($path)
    {
        $array = self::scanDir($path);

        $result = [];

        foreach ($array as &$element) {
            $element = $path . $element;

            if (is_dir($element)) {
                $element .= '/';
                $result[] = $element;
            }
        }

        unset($element);

        return $result;
    }
}
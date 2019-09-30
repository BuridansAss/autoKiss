<?php


namespace AutoKiss;


class Utils
{
    /**
     * @param $path
     * @return array
     */
    public static function scanDir($path) : array
    {
        return array_diff(scandir($path), ['.', '..']);
    }

    /**
     * @param $path
     * @return array
     */
    public static function scanDirFullPath($path) : array
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
    public static function getOnlyDirs($path) : array
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

    /**
     * @param $path
     * @param $ext
     * @return array
     */
    public static function getFilesByExtension($path, $ext) : array
    {
        $filesAndDirs = self::scanDirFullPath($path);
        $result = [];

        foreach ($filesAndDirs as $fileOrDir) {
            if (!self::isExtension($fileOrDir, $ext)) {
                continue;
            }

            $result[] = $fileOrDir;
        }

        return $result;
    }

    /**
     * @param $path
     * @param $ext
     * @return bool
     */
    public static function isExtension($path, $ext) : bool
    {
        if (is_dir($path)) {
            return false;
        }

        $countSymbols = mb_strlen($ext, 'UTF-8');
        $fileExt = substr($path, -$countSymbols);

        if ($fileExt !== $ext) {
            return false;
        }

        return true;
    }
}
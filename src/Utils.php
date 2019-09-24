<?php


namespace Tool;


use Exception;

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

    /**
     * @param $path
     * @return mixed
     * @throws Exception
     */
    public static function getOneDir($path)
    {
        $dir = self::getOnlyDirs($path);

        if (count($dir) === 1) {
            return array_values($dir)[0];
        } else {
            throw new Exception('Больше чем одна папка. Путь: ' . $path);
        }
    }

    /**
     * @param $path
     * @param $ext
     * @return array
     */
    public static function getFilesByExtension($path, $ext)
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
    public static function isExtension($path, $ext)
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

    /**
     * @param $name
     * @param $ext
     * @return bool|string
     */
    public static function getFileNameWithoutExtension($name, $ext)
    {
        $countExtSymbols = mb_strlen($ext, 'UTF-8');
        $countNameSymbols = mb_strlen($name, 'UTF-8');
        $position = $countNameSymbols - $countExtSymbols;

        return substr($name, 0, $position);
    }
}
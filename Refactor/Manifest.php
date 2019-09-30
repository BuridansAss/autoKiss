<?php


namespace AutoKiss;


class Manifest
{
    /**
     * @return array
     */
    private static function getManifest() : array
    {
        $json = file_get_contents(ROOT . '/manifest.json');

        return json_decode($json, 1);
    }

    /**
     * @param $json string
     */
    private static function setManifest($json) : void
    {
        file_put_contents(ROOT . '/manifest.json', $json);
    }

    /**
     * @return string
     */
    public static function getSource() : string
    {
        $manifest = self::getManifest();

        return $manifest['res'];
    }

    /**
     * @return string
     */
    public static function getBuild() : string
    {
        $manifest = self::getManifest();

        return $manifest['build'];
    }
}
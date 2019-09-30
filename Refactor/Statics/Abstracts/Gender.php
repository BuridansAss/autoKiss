<?php


namespace AutoKiss\Statics\Abstracts;


abstract class Gender
{
    const UNISEX    = 0;
    const GETEROSEX = 1;

    const UNISEX_NAME    = 'uni';
    const GETEROSEX_NAME = 'getero';

    private static $genderMap = [
        self::UNISEX    => self::UNISEX_NAME,
        self::GETEROSEX => self::GETEROSEX_NAME,
    ];

    /**
     * @param $path
     * @return string
     */
    abstract protected function findOutGender() : string;

    /**
     * @param $id
     * @return string
     */
    protected static function mappingGender($id) : string
    {
        if (isset(self::$genderMap[$id])) {
            return self::$genderMap[$id];
        }

        return self::$genderMap[0];
    }

}
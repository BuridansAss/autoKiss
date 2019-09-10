<?php


namespace Tool\PictureCreator\Gifts;


use ReflectionClass;
use ReflectionException;

class GiftBase
{
    const RU_NORMAL = GIFTS_BUILD;
    const RU_LARGE  = self::RU_NORMAL . 'large/';
    const RU_SMALL  = self::RU_NORMAL . 'small/';
    const EN_NORMAL = GIFTS_BUILD . 'en_US/';
    const EN_LARGE  = self::EN_NORMAL . 'large/';
    const EN_SMALL  = self::EN_NORMAL . 'small/';

    private $dirs = [
        self::RU_NORMAL,
        self::RU_LARGE ,
        self::RU_SMALL ,
        self::EN_NORMAL,
        self::EN_LARGE ,
        self::EN_SMALL ,
    ];

    /**
     * GiftBase constructor.
     */
    protected function __construct()
    {
        try {
            $rClass = new ReflectionClass($this);
            $constants = $rClass->getConstants();

            foreach ($this->dirs as $dir) {
                if (!is_dir($dir)) {
                    mkdir($dir, 0777, true);
                }
            }
        } catch (ReflectionException $e) {
            echo $e->getMessage();
        }
    }
}
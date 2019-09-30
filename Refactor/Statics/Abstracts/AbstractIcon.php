<?php


namespace AutoKiss\Statics\Abstracts;


abstract class AbstractIcon extends Gender
{

    /**
     * @return string
     */
    protected function findOutGender(): string
    {
        return self::mappingGender(self::UNISEX);
    }
}
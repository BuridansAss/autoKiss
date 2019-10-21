<?php


namespace AutoKiss\Commands;


abstract class Command
{
    /**
     * @var string
     */
    private $name;

    /**
     * Command constructor.
     * @param $name
     */
    protected function __construct($name)
    {
        $this->name = $name;
    }

    public abstract static function create() : Command;
}
<?php


namespace AutoKiss\Statics\Mono;


use AutoKiss\Statics\Abstracts\AbstractFrame;
use AutoKiss\Statics\Abstracts\Mono;
use AutoKiss\Statics\Abstracts\Nominal;

class Frame extends AbstractFrame implements Mono, Nominal
{
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @return string
     */
    public function nominalPath(): string
    {
        // TODO: Implement nominalPath() method.
    }
}
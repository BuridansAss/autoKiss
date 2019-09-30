<?php


namespace AutoKiss\Statics\Timeline;


use AutoKiss\Statics\Abstracts\AbstractFrame;
use AutoKiss\Statics\Abstracts\Nominal;
use AutoKiss\Statics\Abstracts\Timeline;

class Frame extends AbstractFrame implements Timeline, Nominal
{

    public function __construct()
    {
        parent::__construct();

        foreach ($this->frameDirs as $dir) {
            $this->findOutGender($dir);
        }
    }

    /**
     * @return string
     */
    public function nominalPath(): string
    {
        // TODO: Implement nominalPath() method.
    }
}
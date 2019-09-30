<?php


namespace AutoKiss\Statics\Factories;


use AutoKiss\Statics\Abstracts\AbstractFactory;
use AutoKiss\Statics\Abstracts\Mono;
use AutoKiss\Statics\Abstracts\Timeline;
use AutoKiss\Statics\Mono\Icon as MonoIcon;
use AutoKiss\Statics\Timeline\Icon as TimelineIcon;

class IconFactory implements AbstractFactory
{
    /**
     * @return Timeline
     */
    public function createTimeline(): Timeline
    {
        return new TimelineIcon;
    }

    /**
     * @return Mono
     */
    public function createMono(): Mono
    {
        return  new MonoIcon;
    }
}
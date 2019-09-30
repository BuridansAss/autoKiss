<?php


namespace AutoKiss\Statics\Factories;


use AutoKiss\Statics\Abstracts\AbstractFactory;
use AutoKiss\Statics\Abstracts\Mono;
use AutoKiss\Statics\Abstracts\Timeline;
use AutoKiss\Statics\Mono\Hat as MonoHat;
use AutoKiss\Statics\Timeline\Hat as TimelineHat;

class HatFactory implements AbstractFactory
{
    /**
     * @return Timeline
     */
    public function createTimeline(): Timeline
    {
        return new TimelineHat;
    }

    /**
     * @return Mono
     */
    public function createMono(): Mono
    {
        return new MonoHat();
    }
}
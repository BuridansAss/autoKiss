<?php


namespace AutoKiss\Statics\Factories;


use AutoKiss\Statics\Abstracts\AbstractFactory;
use AutoKiss\Statics\Abstracts\Mono;
use AutoKiss\Statics\Abstracts\Timeline;
use AutoKiss\Statics\Mono\Frame as MonoFrame;
use AutoKiss\Statics\Timeline\Frame as TimelineFrame;


class FrameFactory implements AbstractFactory
{
    /**
     * @return Timeline
     */
    public function createTimeline(): Timeline
    {
        return new TimelineFrame;
    }

    /**
     * @return Mono
     */
    public function createMono(): Mono
    {
        return new MonoFrame;
    }
}
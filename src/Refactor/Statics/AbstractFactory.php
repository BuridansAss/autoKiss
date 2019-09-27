<?php


namespace AutoKiss\Statics;


interface AbstractFactory
{
    /**
     * @return Timeline
     */
    public function createTimeline() : Timeline;

    /**
     * @return Mono
     */
    public function createMono() : Mono;
}
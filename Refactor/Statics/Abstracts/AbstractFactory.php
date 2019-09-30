<?php


namespace AutoKiss\Statics\Abstracts;


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
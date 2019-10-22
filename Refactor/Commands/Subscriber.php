<?php


namespace AutoKiss\Commands;


interface Subscriber
{
    public function process() : void;
}
<?php


namespace AutoKiss\Commands;


interface Command
{
    public function getPath() : string ;

    public function handle() : void;

}
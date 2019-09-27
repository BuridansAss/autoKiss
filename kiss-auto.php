<?php

require "vendor/autoload.php";

use AutoKiss\App;

function commands($argv){

    unset($argv[0]);

    return $argv;
}

App::run(commands($argv));
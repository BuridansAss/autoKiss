<?php

require 'vendor/autoload.php';

define('ROOT', __DIR__ . '/');
define('BUILD', __DIR__ . '/build/');
define('SOURCE', __DIR__ . '/source/');

(new \Tool\Images\Gifts\Prepare())->tmp();
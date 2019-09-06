<?php

use Tool\Path;
use Tool\PictureCreator\Unifier;
use Tool\Utils;

require 'vendor/autoload.php';

define('ROOT', __DIR__ . '/');
define('BUILD', __DIR__ . '/build/');
define('SOURCE', __DIR__ . '/source/');
define('FRAME_BUILD', BUILD . 'static/game/images/collection/');

new Unifier();
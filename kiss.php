<?php

use Tool\Path;
use Tool\PictureCreator\Animation\Hat\MetaHatAnimation;
use Tool\PictureCreator\Unifier;
use Tool\Utils;

require 'vendor/autoload.php';

define('ROOT', __DIR__ . '/');
define('BUILD', __DIR__ . '/build/');
define('SOURCE', __DIR__ . '/source/');
define('FRAME_BUILD', BUILD . 'static/game/images/collection/');
define('HAT_BUILD', BUILD . 'static/game/assets/hats/animated/images/');
define('ICON_BUILD', BUILD . 'static/game/assets/nameicons/images/');

echo print_r(Path::getSource(3), 1);
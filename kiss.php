<?php

use Tool\App;
use Tool\Configs\Masquerade\IO\Reader;
use Tool\Path;
use Tool\PictureCreator\Animation\Hat\MetaHatAnimation;
use Tool\PictureCreator\Gifts\Gift;
use Tool\PictureCreator\Gifts\GiftBase;
use Tool\PictureCreator\Unifier;
use Tool\Settings;
use Tool\TMP\StickersRename;
use Tool\Utils;

require 'vendor/autoload.php';

define('ROOT', __DIR__ . '/');
define('BUILD', __DIR__ . '/build/');
define('SOURCE', __DIR__ . '/source/');
define('FRAME_BUILD', BUILD . 'static/game/images/collection/');
define('HAT_BUILD', BUILD . 'static/game/assets/hats/animated/images/');
define('ICON_BUILD', BUILD . 'static/game/assets/nameicons/images/');
define('GIFTS_BUILD', BUILD . 'static/game/images/gifts/');
define('OLD_GIFTS_SOURCE', ROOT . 'src/PictureCreator/Gifts/__src/');
define('TEMPLATES', ROOT. 'src/Configs/_templates/');
define('MOBILE_SOURCE', SOURCE . 'mobile/');
define('EVENT_STARS_MOBILE', BUILD . 'static-mobile/contest/icons/');

$GLOBALS['isNeedInSource'] = true;

//Unifier::createFrameStatic();
//Unifier::createHatStatic();
//Unifier::createIconStatic();
//Unifier::createOldGiftStatic(7);
//Unifier::createOldGiftStatic(7);
//Unifier::createOldGiftStatic(7);
Unifier::createNewGiftsStatic();
//Unifier::createEventStarsStatic();


/*$pathToBot = '/home/evgen/Загрузки/bots/';

$botsDirs = Utils::getOnlyDirs($pathToBot);

function getExt($path)
{
    $jpg = '.jpg';
    $jpeg = '.jpeg';
    $png = '.png';

    if (Utils::isExtension($path , $jpg)) {
        return $jpg;
    }

    if (Utils::isExtension($path , $jpeg)) {
        return $jpeg;
    }

    if (Utils::isExtension($path , $png)) {
        return $png;
    }
}

foreach ($botsDirs as $dir) {
    $dirToMale = Utils::scanDirFullPath($dir . 'male/');
    $dirToFemale = Utils::scanDirFullPath($dir . 'female/');

    $pathToM = $dir . 'male/';
    $pathToF = $dir . 'female/';

    $i = 45;
    foreach ($dirToFemale as $picture) {

        $ext = getExt($picture);

        rename($picture , $pathToF . 'bot' . $i . $ext);

        echo $pathToF . 'bot' . $i . $ext . PHP_EOL;

        $i++;
    }

    $i = 30;
    foreach ($dirToMale as $picture) {

        $ext = getExt($picture);

        rename($picture , $pathToM . 'bot' . $i . $ext);

        echo $pathToM . 'bot' . $i . $ext . PHP_EOL;

        $i++;
    }

    \Tool\TMP\ChangeExt::change($pathToM);
    \Tool\TMP\ChangeExt::change($pathToF);
}*/



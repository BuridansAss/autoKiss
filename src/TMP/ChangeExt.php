<?php


namespace Tool\TMP;


use Tool\PictureCreator\Canvas;
use Tool\PictureCreator\Image;
use Tool\Utils;

class ChangeExt
{
    public static function change($path)
    {
        $pictures = Utils::scanDirFullPath($path);
        $newPath = $path . 'PNG/';

        if (!is_dir($newPath)) {
            mkdir($newPath, 0777, true);
        }
        $i = 0;
        foreach ($pictures as $picture) {

            if (is_dir($picture)) {
                continue;
            }

            $image = new Image($picture);
            $width = $image->getWidth();
            $height = $image->getHeight();

            $canvas = new Canvas();
            $canvas->createEmptyCanvas($width, $height);

            $canvas->draw($image, 0 ,0);

            $canvas->save($newPath . 'bot' . $i . '.png');

            echo $newPath . 'bot' . $i . '.png' . PHP_EOL;

            unset ($canvas);
            unset($image);
            $i++;
        }
    }
}
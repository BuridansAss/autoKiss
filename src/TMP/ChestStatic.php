<?php


namespace Tool\TMP;


use ImagickException;
use Tool\PictureCreator\Canvas;
use Tool\PictureCreator\Image;
use Tool\Utils;

class ChestStatic
{
    /**
     * @param $path
     * @throws ImagickException
     */
    public static function create($path) {
        $pictures = Utils::scanDirFullPath($path);
        $i = 1;
        foreach ($pictures as $picture) {
            $image = new Image($picture);
            $image->setSize(250 ,250);

            $canvas = new Canvas();
            $canvas->createEmptyCanvas(250, 250);
            $canvas->draw($image, 0, 0);
            $canvas->save(BUILD . 'tmp/' . $i . '.png');

            $i++;
            unset ($canvas);

            $image->setSize(100, 100);

            $canvas = new Canvas();
            $canvas->createEmptyCanvas(100, 100);
            $canvas->draw($image, 0, 0);
            $canvas->save(BUILD . 'tmp/' . $i . '.png');
            $i++;

            unset($canvas);
            unset($image);
        }
    }
}
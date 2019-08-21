<?php


namespace Tool\Images\Gifts;

use Tool\PictureCreator\Canvas;
use Tool\PictureCreator\Image;
use Tool\Utils;

class Prepare
{
    const SOURCE = __DIR__ . '/source/';


    public function tmp()
    {
        $path = self::SOURCE . '1/';

        $files = Utils::scanDirFullPath($path);

        if (!is_dir(self::SOURCE. 'images')) {
            mkdir(self::SOURCE. 'images', 0777, true);
        }

        $i = 1;
        foreach ($files as $file) {

            try {
                $img = new Image($file);
                $width = $img->getWidth();
                $height = $img->getHeight();

                $canvas = new Canvas();
                $canvas->createEmptyCanvas($width, $height);
                $canvas->draw($img, 0,0);

                if (!is_dir(self::SOURCE . 'images/' . "$i")) {
                    mkdir(self::SOURCE . 'images/' . "$i", 0777, true);
                }

                $canvas->save(self::SOURCE . 'images/' . "$i/$width.png");

                $width = 125;
                $height = 125;

                $img->setSize($width, $height);

                $canvas->createEmptyCanvas($width, $height);
                $canvas->draw($img, 0,0);

                if (!is_dir(self::SOURCE . 'images/' . "$i")) {
                    mkdir(self::SOURCE . 'images/' . "$i", 0777, true);
                }
                $canvas->save(self::SOURCE . 'images/' . "$i/$width.png");

                $width = 38;
                $height = 38;

                $img->setSize($width, $height);

                $canvas->createEmptyCanvas($width, $height);
                $canvas->draw($img, 0,0);

                if (!is_dir(self::SOURCE . 'images/' . "$i")) {
                    mkdir(self::SOURCE . 'images/' . "$i", 0777, true);
                }
                $canvas->save(self::SOURCE . 'images/' . "$i/$width.png");

                $i++;
            } catch (\ImagickException $e) {
                echo $e;
            }

        }
    }
}
<?php


namespace Tool\PictureCreator;


use Exception;
use ImagickException;
use Tool\Path;
use Tool\PictureCreator\Animation\FrameAnimator;
use Tool\PictureCreator\Animation\HatAnimator;
use Tool\PictureCreator\Animation\IconAnimator;
use Tool\PictureCreator\Gifts\Gift;
use Tool\PictureCreator\Mobile\EventStars;
use Tool\Utils;

class Unifier
{
    /**
     * create frameImages
     */
    public static function createFrameStatic()
    {
        try {
            $paths = Path::getSource(Path::ITEM_FRAME);
            foreach ($paths as $path) {
                try {
                    $animation = new FrameAnimator($path);
                    $animation->animate();
                } catch (ImagickException $e) {
                    echo $e->getMessage();
                }
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    /**
     * create hat images
     */
    public static function createHatStatic()
    {
        try {
            $paths = Path::getSource(Path::ITEM_HAT);
            foreach ($paths as $path) {
                try {
                    $animation = new HatAnimator($path);
                    $animation->animate();
                } catch (ImagickException $e) {
                    echo $e->getMessage();
                }
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    /**
     * create Icon images
     * эта штука сразу кидает картинки в нужную папку в проекте из settings.json
     * inSourceFolder : {.....}
     *
     */
    public static function  createIconStatic()
    {
        try {
            $paths = Path::getSource(Path::ITEM_ICON);
            foreach ($paths as $path) {
                try {
                    $animation = new IconAnimator($path);
                    $animation->animate();
                } catch (ImagickException $e) {
                    echo $e->getMessage();
                }
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    /**
     *  create images from source folder
     */
    public static function createNewGiftsStatic()
    {
        $paths = Path::getGiftsSource();

        foreach ($paths as $path) {
            $pictures = Utils::scanDirFullPath($path);

            foreach ($pictures as $picture) {
                $gift = new Gift($picture);
                $gift->drawGifts();
                echo $picture . PHP_EOL;
            }
        }
    }

    /**
     * @param $folderId
     */
    public static function createOldGiftStatic($folderId)
    {
        $pictures = Utils::scanDirFullPath(Path::getOldGiftFolder($folderId));

        foreach ($pictures as $picture) {
            $gift = new Gift($picture);
            $gift->drawGifts();
            echo $picture . PHP_EOL;
        }
    }

    /**
     *
     */
    public static function createEventStarsStatic()
    {
        $pictures = Path::getEventStarsSource();

        foreach ($pictures as $picture) {
            $stars = new EventStars($picture);
            $stars->createImagesByImage();
            echo $picture . PHP_EOL;
        }
    }
}
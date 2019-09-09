<?php


namespace Tool\PictureCreator;


use Exception;
use ImagickException;
use Tool\Path;
use Tool\PictureCreator\Animation\FrameAnimator;
use Tool\PictureCreator\Animation\HatAnimator;

class Unifier
{
    /**
     * Unifier constructor.
     */
    public function __construct()
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
            $e->getMessage();
        }

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
            $e->getMessage();
        }
    }
}
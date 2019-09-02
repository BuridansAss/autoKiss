<?php


namespace Tool\PictureCreator;


use Tool\Path;
use Tool\PictureCreator\Animation\FrameAnimator;

class Unifier
{
    public function __construct()
    {
        $paths = Path::getFramesSources();

        foreach ($paths as $path) {
            try {
                $animation = new FrameAnimator($path);
                $animation->animate();
            } catch (\ImagickException $e) {
                echo $e->getMessage();
            }
        }
    }
}
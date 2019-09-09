<?php


namespace Tool\PictureCreator\Animation;


use ImagickException;
use Tool\PictureCreator\Animation\Icon\MetaIconAnimation;

class IconAnimator extends AbstractAnimator
{
    /**
     * IconAnimator constructor.
     * @param $path
     * @throws ImagickException
     */
    public function __construct($path)
    {
        parent::__construct($path);
    }


    public function animate()
    {
        $metaIconAnimation = new MetaIconAnimation(self::ALL_CLASS, $this->path);


    }
}
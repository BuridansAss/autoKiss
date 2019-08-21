<?php


namespace Tool\PictureCreator\Animation;


use Exception;
use ImagickException;
use Tool\PictureCreator\Animation\Frame\MetaFrameAnimation;
use Tool\Utils;

class FrameAnimator extends AbstractAnimator implements AnimationInterface
{
    const ACTIVE  = 'active';
    const PASSIVE = 'passive';

    const ALL_CLASS = 'All';
    const MALE_CLASS = 'Male';
    const FEMALE_CLASS = 'Female';

    const TYPE_UNI_SEX       = 0;
    const TYPE_DIFFERENT_SEX = 1;


    /**
     * FrameAnimator constructor.
     * @param $path
     * @throws ImagickException
     */
    public function __construct($path)
    {
        parent::__construct($path);
    }

    /**
     * @throws ImagickException
     */
    public function animate()
    {
        $metaAnimator = new MetaFrameAnimation();

        if ($this->getType() === self::TYPE_UNI_SEX) {
            $allCanvas = $metaAnimator->animate(self::ALL_CLASS);
        } else {
            $maleCanvas   = $metaAnimator->animate(self::MALE_CLASS);
            $femaleCanvas = $metaAnimator->animate(self::FEMALE_CLASS);
        }

    }

    /**
     * @return int
     */
    public function getType()
    {
        $dir = Utils::scanDir($this->path);

        if (in_array('128', $dir)) {
            return self::TYPE_UNI_SEX;
        }

        return self::TYPE_DIFFERENT_SEX;
    }

}
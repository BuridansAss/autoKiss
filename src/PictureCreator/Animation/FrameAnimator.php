<?php


namespace Tool\PictureCreator\Animation;


use Exception;
use ImagickException;
use Tool\PictureCreator\Animation\Frame\MetaFrameAnimation;
use Tool\PictureCreator\Namings\FrameNaming;
use Tool\Settings;
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
            $allCanvas = $metaAnimator->animate(self::ALL_CLASS, $this->path);
            $allCanvas->save(FrameNaming::getAllFrameName());
            try {
                Settings::setNextIdItem(Settings::FRAME);
            } catch (Exception $e) {
                echo $e->getMessage();
            }
        } else {
            $maleCanvas   = $metaAnimator->animate(self::MALE_CLASS, $this->path);
            $maleCanvas->save(FrameNaming::getMaleFrameName());
            $femaleCanvas = $metaAnimator->animate(self::FEMALE_CLASS, $this->path);
            $femaleCanvas->save(FrameNaming::getFemaleFrameName());
            try {
                Settings::setNextIdItem(Settings::FRAME);
            } catch (Exception $e) {
                echo $e->getMessage();
            }
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
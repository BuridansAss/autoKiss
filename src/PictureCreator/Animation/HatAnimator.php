<?php


namespace Tool\PictureCreator\Animation;


use Exception;
use ImagickException;
use Tool\PictureCreator\Animation\Hat\MetaHatAnimation;
use Tool\PictureCreator\Namings\HatNaming;
use Tool\Settings;

class HatAnimator extends AbstractAnimator
{
    const IS_STATIC_IMAGE = true;

    /**
     * HatAnimator constructor.
     * @param $path
     * @throws ImagickException
     */
    public function __construct($path)
    {
        parent::__construct($path);
    }


    /**
     * @throws ImagickException
     * @throws Exception
     */
    public function animate()
    {
        $metaAnimator = new MetaHatAnimation();

        if ($this->getType() === self::TYPE_UNI_SEX) {
            $allCanvas = $metaAnimator->animate(self::ALL_CLASS, $this->path);
            $allCanvas->save(HatNaming::getAllHatName());

            $staticAllCanvas = $metaAnimator->staticImage();
            $staticAllCanvas->save(HatNaming::getAllHatName(self::IS_STATIC_IMAGE));
            try {
                Settings::setNextIdItem(Settings::HAT);
            } catch (Exception $e) {
                echo $e->getMessage();
            }
        } else {
            $maleCanvas   = $metaAnimator->animate(self::MALE_CLASS, $this->path);
            $maleCanvas->save(HatNaming::getMaleHatName());
            $staticMaleCanvas = $metaAnimator->staticImage();
            $staticMaleCanvas->save(HatNaming::getMaleHatName(self::IS_STATIC_IMAGE));

            $femaleCanvas = $metaAnimator->animate(self::FEMALE_CLASS, $this->path);
            $femaleCanvas->save(HatNaming::getFemaleHatName());
            $staticFemaleCanvas = $metaAnimator->staticImage();
            $staticFemaleCanvas->save(HatNaming::getFemaleHatName(self::IS_STATIC_IMAGE));
            try {
                Settings::setNextIdItem(Settings::HAT);
            } catch (Exception $e) {
                echo $e->getMessage();
            }
        }
    }
}
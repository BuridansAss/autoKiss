<?php


namespace Tool\PictureCreator\Animation;


use Exception;
use ImagickException;
use Tool\PictureCreator\Animation\Icon\MetaIconAnimation;
use Tool\PictureCreator\Namings\IconNaming;
use Tool\Settings;

class IconAnimator extends AbstractAnimator
{
    const SIZE_20 = 20;
    const SIZE_72 = 72;

    /**
     * IconAnimator constructor.
     * @param $path
     * @throws ImagickException
     */
    public function __construct($path)
    {
        parent::__construct($path);
    }

    /**
     * @throws Exception
     */
    public function animate()
    {
        $metaIconAnimation = new MetaIconAnimation(self::ALL_CLASS, $this->path);

        $canvas20 = $metaIconAnimation->staticImageBySize(self::SIZE_20);
        $canvas72 = $metaIconAnimation->staticImageBySize(self::SIZE_72);

        $canvas20->save(IconNaming::getIconName(self::SIZE_20));
        $canvas72->save(IconNaming::getIconName(self::SIZE_72));

        Settings:: setNextIdItem(Settings::ICON);

    }
}
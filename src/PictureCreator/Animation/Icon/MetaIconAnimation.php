<?php


namespace Tool\PictureCreator\Animation\Icon;


use Exception;
use Tool\PictureCreator\Canvas;

class MetaIconAnimation
{
    /**
     * @var Gender
     */
    private $gender;

    /**
     * MetaIconAnimation constructor.
     * @param $gender
     * @param $pathToIcon
     */
    public function __construct($gender, $pathToIcon)
    {
        $genderClass = '\Tool\PictureCreator\Animation\Icon\\' . $gender;
        $this->gender = new $genderClass($pathToIcon);
    }

    /**
     * @param $size int
     * @return Canvas
     * @throws Exception
     */
    public function staticImageBySize($size)
    {
        try {
            return $this->gender->getStaticImageBySize($size);
        } catch (Exception $e) {
            echo $e;
        }

        return new Canvas();
    }
}
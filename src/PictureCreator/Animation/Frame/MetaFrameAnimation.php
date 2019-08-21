<?php


namespace Tool\PictureCreator\Animation\Frame;


use ImagickException;
use Tool\PictureCreator\Canvas;

class MetaFrameAnimation
{
    /**
     * @var Gender
     */
    private $gender;

    /**
     * @param $gender
     * @return Canvas
     * @throws ImagickException
     */
    public function animate($gender)
    {
        $genderClass = '\Tool\PictureCreator\Animation\Frame\\' . $gender;
        $gender = new $genderClass();

        try {
            return $this->gender->animate();
        } catch (\Exception $e) {
            echo $e;
        }

        return new Canvas();
    }
}
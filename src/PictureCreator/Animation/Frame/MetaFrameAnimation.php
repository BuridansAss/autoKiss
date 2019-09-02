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
     * @param $pathToFrame
     * @return Canvas
     * @throws ImagickException
     */
    public function animate($gender, $pathToFrame)
    {
        $genderClass = '\Tool\PictureCreator\Animation\Frame\\' . $gender;
        $this->gender = new $genderClass($pathToFrame);

        try {
            return $this->gender->animate();
        } catch (\Exception $e) {
            echo $e;
        }

        return new Canvas();
    }
}
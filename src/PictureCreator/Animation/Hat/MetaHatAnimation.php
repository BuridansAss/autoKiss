<?php


namespace Tool\PictureCreator\Animation\Hat;


use Exception;
use ImagickException;
use Tool\PictureCreator\Canvas;

class MetaHatAnimation
{
    /**
     * @var Gender
     */
    private $gender;

    /**
     * TODO в коструктор часть с классом
     * @param $gender
     * @param $pathToHat
     * @return Canvas
     * @throws ImagickException
     */
    public function animate($gender, $pathToHat)
    {
        $genderClass = '\Tool\PictureCreator\Animation\Hat\\' . $gender;
        $this->gender = new $genderClass($pathToHat);

        try {
            return $this->gender->animate();
        } catch (Exception $e) {
            echo $e;
        }

        return new Canvas();
    }

    /**
     * @return Canvas
     * @throws ImagickException
     */
    public function staticImage()
    {
        try {
            return $this->gender->getStaticImage();
        } catch (Exception $e) {
            echo $e;
        }

        return new Canvas();
    }
}
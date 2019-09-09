<?php


namespace Tool\PictureCreator\Animation\Hat;


class Male extends Gender
{
    const MALE_FOLDER = 'man/';

    public function __construct($path)
    {
        parent::__construct($path);

        $this->active = $this->path . self::MALE_FOLDER . '75/';
    }
}
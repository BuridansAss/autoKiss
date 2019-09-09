<?php


namespace Tool\PictureCreator\Animation\Hat;


class Female extends Gender
{
    const FEMALE_FOLDER = 'fem/';

    public function __construct($path)
    {
        parent::__construct($path);

        $this->active = $this->path . self::FEMALE_FOLDER . '75/';
    }
}
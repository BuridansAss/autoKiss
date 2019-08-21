<?php


namespace Tool\PictureCreator\Animation\Frame;


class Female extends Gender
{
    const FEMALE_FOLDER = 'fem/';

    public function __construct($path)
    {
        parent::__construct($path);

        $this->active  = $this->path . self::FEMALE_FOLDER . '128/' . self::ACTIVE_FOLDER;
        $this->passive = $this->path . self::FEMALE_FOLDER . '128/' . self::PASSIVE_FOLDER;
    }
}
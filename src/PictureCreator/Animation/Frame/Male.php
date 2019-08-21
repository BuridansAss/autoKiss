<?php


namespace Tool\PictureCreator\Animation\Frame;


class Male extends Gender
{
    const MALE_FOLDER   = 'man/';

    /**
     * Male constructor.
     * @param $path
     */
    public function __construct($path)
    {
        parent::__construct($path);

        $this->active  = $this->path . self::MALE_FOLDER . '128/' . self::ACTIVE_FOLDER;
        $this->passive = $this->path . self::MALE_FOLDER . '128/' . self::PASSIVE_FOLDER;
    }
}
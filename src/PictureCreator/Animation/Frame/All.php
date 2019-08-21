<?php


namespace Tool\PictureCreator\Animation\Frame;


class All extends Gender
{
    public function __construct($path)
    {
        parent::__construct($path);

        $this->active  = $this->path . '128/' . self::ACTIVE_FOLDER;
        $this->passive = $this->path . '128/' . self::PASSIVE_FOLDER;
    }
}
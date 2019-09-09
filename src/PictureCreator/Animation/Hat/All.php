<?php


namespace Tool\PictureCreator\Animation\Hat;


class All extends Gender
{
    /**
     * All constructor.
     * @param $path
     */
    public function __construct($path)
    {
        parent::__construct($path);

        $this->active = $this->path . '75/';
    }
}
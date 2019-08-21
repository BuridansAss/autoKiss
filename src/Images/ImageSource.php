<?php


namespace Tool\Images;


use Tool\Utils;

class ImageSource
{
    const UPLOAD = ROOT . '/source/';

    /**
     * @var array
     */
    private $srcFolders;

    /**
     * Sprites constructor.
     */
    public function __construct()
    {
        $this->srcFolders = Utils::scanDirFullPath(self::UPLOAD);

        echo  print_r($this->srcFolders, 1);
    }
}
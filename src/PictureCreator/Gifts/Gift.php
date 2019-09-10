<?php


namespace Tool\PictureCreator\Gifts;


use ImagickException;
use Tool\PictureCreator\Canvas;
use Tool\PictureCreator\Image;
use Tool\Settings;

class Gift extends GiftBase
{
    const SMALL_SIZE  = 'small';
    const NORMAL_SIZE = 'normal';
    const LARGE_SIZE  = 'large';

    const SMALL  = 38;
    const NORMAL = 125;
    const LARGE  = 256;

    private $size = [
        self::SMALL_SIZE  => self::SMALL,
        self::NORMAL_SIZE => self::NORMAL,
        self::LARGE_SIZE  => self::LARGE,
    ];

    protected $giftPathMap = [
        self::NORMAL => [
            self::RU_NORMAL,
            self::EN_NORMAL
        ],

        self::SMALL => [
            self::RU_SMALL,
            self::EN_SMALL
        ],

        self::LARGE => [
            self::RU_LARGE,
            self::EN_LARGE
        ]
    ];

    /**
     * @var string
     */
    private $path;

    private $giftId;

    /**
     * Gift constructor.
     * @param $path
     */
    public function __construct($path)
    {
        parent::__construct();

        $this->path = $path;
        $this->giftId = $giftId = Settings::getNextGiftId();
    }

    /**
     * @param $size
     * @throws ImagickException
     */
    private function createImage($size)
    {
        $image = new Image($this->path);

        $width = $image->getWidth();
        $height = $image->getHeight();

        if (($width !== $height) | ($width < self::LARGE) | ($height < self::LARGE)) {
            throw new ImagickException('Плохой размер ' . $this->path);
        }

        if (in_array($size, $this->size)) {
            $image->setSize($size, $size);
        } else {
            throw new ImagickException('Неверный размер ' . $size);
        }

        $canvas = new Canvas();
        $canvas->createEmptyCanvas($size, $size);
        $canvas->draw($image, 0, 0);

        foreach ($this->getPathNames($size) as $path) {
            $canvas->save($path);
        }

        unset($image);
        unset($canvas);
    }

    /**
     * @param $size
     * @return array
     */
    private function getPathNames($size)
    {
        $result = [];

        foreach ($this->giftPathMap[$size] as $path) {
            $result[] = $path . $this->giftId . '.png';
        }

        return $result;
    }

    /**
     * draw gifts in build
     */
    public function drawGifts()
    {
        foreach ($this->size as $value) {
            try {
                $this->createImage($value);
            } catch (ImagickException $e) {
                echo $e->getMessage();
            }
        }

        Settings::setNextGiftId();
    }

}
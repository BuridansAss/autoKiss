<?php


namespace Tool\PictureCreator\Mobile;


use Exception;
use Tool\PictureCreator\Canvas;
use Tool\Settings;

class EventStars
{
    /**
     * @var string
     */
    private $path;

    /**
     * EventStars constructor.
     * @param $path
     */
    public function __construct($path)
    {
        $this->path = $path;
    }

    /**
     * create and save images
     */
    public function createImagesByImage()
    {
        try {
            $canvases = Resolution::createImagesForDiffResolutions($this->path);

            /**
             * @var $canvas Canvas
             */
            foreach ($canvases as $dpi => $canvas) {
                $canvas->save($this->getBuildPath($dpi));
            }

            Settings::setNextEventId();

        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }


    /**
     * @param $dpi
     * @return string
     */
    private function getBuildPath($dpi)
    {
        $eventId = Settings::getNextEventId();
        if (!is_dir(EVENT_STARS_MOBILE . $eventId . '/')) {
            mkdir(EVENT_STARS_MOBILE . $eventId . '/', 0777, true);
        }
        $iconsName = EVENT_STARS_MOBILE . $eventId . '/' . $dpi . '.png';
        return $iconsName;
    }
}
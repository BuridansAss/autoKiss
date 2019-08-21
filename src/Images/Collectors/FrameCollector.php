<?php


namespace Tool\Images\Collectors;


use ImagickException;
use Tool\Images\Frame;
use Tool\Images\PathCollector;
use Tool\Settings;

class FrameCollector
{
    private $pathCollector;

    private $frames;

    /**
     * FrameCollector constructor.
     * @throws ImagickException
     * @throws \Exception
     */
    public function __construct()
    {
        $this->pathCollector = new PathCollector();

        $sources = $this->pathCollector->getSources();

        foreach ($sources as $source) {
            if (($frameImages = $this->pathCollector->pathToFrameImages($source)) === PathCollector::ERROR) {
                continue;
            }

            $frame = new Frame($frameImages);

            $pathA = $frame->getPathToActive();
            $pathP = $frame->getPathToPassive();

            if (count($pathA) === count($pathP) && count($pathP) > 1) {
                $frame->createAnimation($pathA[0], $pathP[0])->save($frame->fileName(Frame::FEMALE));
                $frame->createAnimation($pathA[1], $pathP[1])->save($frame->fileName(Frame::MALE));
            } else {
                $frame->createAnimation($pathA[0], $pathP[0])->save($frame->fileName(Frame::ALL));
            }

            Settings::setNextIdItem(Settings::FRAME);

            $this->frames[] = $frame;
        }
    }


}
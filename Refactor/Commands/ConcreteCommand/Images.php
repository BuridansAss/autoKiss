<?php


namespace AutoKiss\Commands\ConcreteCommand;


use AutoKiss\Commands\Command;
use AutoKiss\Statics\StaticsFactory;

class Images implements Command
{
    private $monos;

    private $timelines;

    /**
     * Images constructor.
     * @param $items
     */
    public function __construct($items)
    {
        echo 'images construct' . PHP_EOL;

        foreach ($items as $item) {
            $item = StaticsFactory::createFactory($item);
            $this->monos[]     = $item->createMono();
            $this->timelines[] = $item->createTimeline();
        }
    }

    public function getPath(): string
    {
        // TODO: Implement getPath() method.
    }


    public function handle(): void
    {
        $this->handleMonos();
        $this->handleTimelines();
    }

    private function handleMonos()
    {
        foreach ($this->monos as $mono) {
            echo 'mono' . PHP_EOL;
        }
    }

    private function handleTimelines()
    {
        foreach ($this->timelines as $timeline) {
            echo 'timeline' . PHP_EOL;
        }
    }
}
<?php


namespace AutoKiss\Commands\Enum;


use AutoKiss\Commands\Command;

class Frame extends Command
{
    private const FRAME = 'frame';

    /**
     * Frame constructor.
     */
    protected function __construct()
    {
        parent::__construct(self::FRAME);
    }

    public function update(): void
    {
        // TODO: Implement update() method.
    }
}
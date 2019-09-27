<?php


namespace AutoKiss\Notifications;


use AutoKiss\Notifications\Formatter\Formatter;

class ConsolePrinter
{
    /**
     * @var Formatter
     */
    private $format;

    /**
     * ConsolePrinter constructor.
     */
    public function __construct()
    {
        $this->format = Formatter::create();
    }

    /**
     * @param $message string
     */
    public function badMessage($message) : void
    {
        $this->format
            ->setMessage($message)
            ->setFontColor(Formatter::RED)
            ->printLn();
    }

    /**
     * @param $message string
     */
    public function goodMessage($message) : void
    {
        $this->format
            ->setMessage($message)
            ->setFontColor(Formatter::GREEN)
            ->printLn();
    }

    /**
     * @param $message string
     */
    public function neutralMessage($message) : void
    {
        $this->format
            ->setMessage($message)
            ->setFontColor(Formatter::WHITE)
            ->printLn();
    }
}
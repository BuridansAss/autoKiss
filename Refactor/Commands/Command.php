<?php


namespace AutoKiss\Commands;


abstract class Command
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var array
     */
    private $subscribers;

    /**
     * Command constructor.
     * @param $name
     */
    protected function __construct($name)
    {
        $this->name = $name;
    }

    /**
     * вызывает нужные методы у подписчиков
     */
    public function update() : void
    {
        foreach ($this->subscribers as $subscriber) {
            $subscriber->process();
        }
    }

    /**
     * @param Subscriber $subscriber
     */
    private function addSubscriber(Subscriber $subscriber)
    {
        $this->subscribers[] = $subscriber;
    }

    /**
     * @param $subscribers array
     */
    protected function initSubscribers($subscribers)
    {
        foreach ($subscribers as $subscriber) {

        }
    }
}
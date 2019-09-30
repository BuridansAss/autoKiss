<?php


namespace AutoKiss\Commands;


use AutoKiss\Commands\ConcreteCommand\Images;

class CommandsBuilder
{
    const PREFIX_FILE      = __DIR__ . '/ConcreteCommand/';
    const PREFIX_NAMESPACE = '\\AutoKiss\\Commands\\ConcreteCommand\\';

    /**
     * @param $command
     * @param $params
     * @return Command
     * @throws \Exception
     */
    public static function build($command, $params) : Command
    {
        $file =self::PREFIX_FILE . ucfirst($command) . '.php';
        $namespace = self::PREFIX_NAMESPACE . ucfirst($command);

        if (file_exists($file)) {
            return new $namespace($params);
        } else {
            throw new \Exception('cant build class: ' . $namespace);
        }
    }
}
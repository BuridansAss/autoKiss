<?php


namespace AutoKiss\Statics;



use AutoKiss\Notifications\ConsolePrinter;
use AutoKiss\Statics\Abstracts\AbstractFactory;
use Exception;

class StaticsFactory
{
    /**
     * @param $item
     * @return AbstractFactory
     */
    public static function createFactory($item) : AbstractFactory
    {
        try {
            return self::setFactory($item);
        } catch (Exception $e) {
            ConsolePrinter::exceptionExitFromApp($e->getMessage());
        }
    }

    /**
     * @param $item
     * @return AbstractFactory
     * @throws Exception
     */
    private static function setFactory($item) : AbstractFactory
    {
        $namespace       = 'AutoKiss\\Statics\\Factories\\';
        $pathToNamespace = __DIR__ . '/Factories/';

        $className = $namespace . ucfirst($item) . 'Factory';
        $classPath = $pathToNamespace . ucfirst($item) . 'Factory.php';

        if (file_exists($classPath)) {
            return new $className;
        } else {
            throw new Exception('Cant create factory, file doesnt exist: ' . $classPath);
        }
    }
}
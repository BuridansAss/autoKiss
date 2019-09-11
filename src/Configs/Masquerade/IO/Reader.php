<?php


namespace Tool\Configs\Masquerade\IO;


class Reader
{
    private $descriptor;

    public function __construct()
    {

    }

    public static function read($file)
    {
        $descriptor = fopen($file, 'r');

        $info = [];

        if ($descriptor) {
            while (($line = fgets($descriptor)) !== false) {
                $info[] = self::tmp($line);
            }

            fclose($descriptor);
            return self::tmp2($info);

        } else {
            echo 'error';
        }
    }

    public static function tmp($string)
    {
        $result = [];
        $string = explode(' ', $string);

        foreach ($string as $word) {
            if (!isset($result[$word])) {
                $result[$word] = 1;
            } else {
                $result[$word]++;
            }
        }

        return $result;
    }

    public static function tmp2($doubleArray)
    {
        $result = [];

        foreach ($doubleArray as $array) {
            foreach ($array as $key => $value) {
                if (!isset($result[$key])) {
                    $result[$key] = $value;
                } else {
                    $result[$key] += $value;
                }
            }
        }

        return $result;
    }
}
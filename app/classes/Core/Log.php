<?php

namespace App\Core;

class Log
{
    private static $rootDirPath;
    private $pathlog;
    const NEW_LOG_MESSAGE = "--New Log--";

    public function __construct(string $path_value)
    {
        if(empty(self::$rootDirPath))
        {

            throw new \Exception("Greq default path@");
        }

        $path = $this->getValidPath($path_value);
        $this->pathlog = self::$rootDirPath . "/" . $path;
        if(!file_exists($this->pathlog))
        {
            $path_log_array = explode("/",$path);
            $currentString = self::$rootDirPath . "/";
            foreach ($path_log_array as $key => $value)
            {
                $currentString .= $value . "/";
                if(file_exists($currentString))
                {
                    continue;
                }

                if($key == count($path_log_array) - 1)
                {
                    continue;
                }

                mkdir($currentString);
            }

        }
    }

    public static function setPathByClassName($path_class)
    {
        return new Log($path_class . "log");
    }

    public static function setPathByMethodName($path_method)
    {
        $path_method = str_replace("::","/", $path_method);
        return new Log($path_method . "log");
    }

    public function log(string $text)
    {
        $file = fopen($this->pathlog, "a+");
        $message = PHP_EOL . PHP_EOL . self::NEW_LOG_MESSAGE . PHP_EOL . date("Y.m.d h:i;s") . PHP_EOL . $text;
        fwrite($file, $message);
        fclose($file);
    }

    public static function setRootDir(string $root_path)
    {
        self::$rootDirPath = $root_path;

    }

    public static function getValidPath($path_value)
    {

        $path = trim(str_replace("\\","/",$path_value),"/");
        return $path;
    }
}

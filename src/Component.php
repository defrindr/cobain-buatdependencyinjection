<?php
namespace defrindr\DISample;

use defrindr\DISample\Services\BangunDatarService;
use Exception;

class Component
{
    private static $objs = [];
    private static $obj;
    private static $set;

    public function register($objs = [])
    {
        if (gettype($objs) != "array") {
            throw new Exception("Params must be array", 1);
        }

        foreach ($objs as $key => $obj) {
            $instance = new $obj();

            if ($instance instanceof BangunDatarService) {
                self::$objs[$key] = $instance;
            } else {
                throw new Exception("Class Not Allowed", 1);
            }
        }

        return new static;
    }

    public function has($key)
    {
        if (isset(self::$objs[$key])) {
            return true;
        } else {
            return false;
        }
    }

    public function load($key)
    {
        if (isset(self::$objs[$key])) {
            self::$obj = self::$objs[$key];
            return self::$obj;
        }
        throw new Exception("Instance belum di pilih.", 1);
    }
}

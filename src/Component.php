<?php
namespace defrindr\DISample;

use defrindr\DISample\Services\Service;
use Exception;

class Component
{
    private $objs = [];
    private $obj;
    private $set;

    public function register($objs = [])
    {
        if (gettype($objs) != "array") {
            throw new Exception("Params must be array", 1);
        }
        
        
        foreach ($objs as $key => $obj) {
            $instance = new $obj();
            
            if ($instance instanceof Service) {
                $this->objs[$key] = $instance;
            } else {
                throw new Exception("Class Not Allowed", 1);
            }
        }

        return $this;
    }

    public function has($key)
    {
        if (isset($this->objs[$key])) {
            return true;
        } else {
            return false;
        }
    }

    public function __call($key, $args)
    {
        if (isset($this->objs[$key])) {
            $this->obj = $this->objs[$key];
            return $this->obj;
        }else{
            throw new Exception("Instance belum di pilih.", 1);
        }
    }
}

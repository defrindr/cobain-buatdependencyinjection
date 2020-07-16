<?php
namespace defrindr\DISample\Base;

use Exception;

class Base
{
    public function help()
    {
        $vars = get_class_vars(get_class($this));
        $arr = [];

        foreach ($vars as $key => $val) {
            array_push($arr, $key);
        }

        return $arr;
    }

    public function params($arr)
    {
        
        $vars = get_class_vars(get_class($this));
        
        foreach ($vars as $key => $var) {
            if (isset($arr[$key])) {
                $this->$key = $arr[$key];
            }
            
        }

        foreach ($vars as $key => $var) {
            print_r($this->$key);
            if (empty($this->$key)) {
                throw new Exception("Variable \$$key never set.", 1);
            }

        }
        return $this;
    }

    public function get($func)
    {
        $lists = get_class_methods($this);
        foreach ($lists as $list) {
            if ($list == $func) {
                return $this->$func();
            }
        }
    }
}

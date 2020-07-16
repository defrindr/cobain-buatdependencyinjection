<?php
namespace defrindr\DISample\Base;

use Exception;

class Base
{
    public function assignVar($arr)
    {
        $vars = get_class_vars(get_class($this));

        foreach ($vars as $key => $var) {
            if (isset($arr[$key])) {
                $this->$key = $arr[$key];
            }

        }
        foreach ($vars as $key => $var) {
            if (empty($this->$key)) {
                throw new Exception("Variable \$$key Never Set.", 1);
            }

        }

    }
}

<?php
namespace defrindr\DISample\BangunDatar;

use defrindr\DISample\Base\BangunDatar;

class Persegi extends BangunDatar
{
    protected $sisi;

    public function luas()
    {
        return pow($this->sisi, 2);
    }

    public function keliling()
    {
        return $this->sisi * 4;
    }
}

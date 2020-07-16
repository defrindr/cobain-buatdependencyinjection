<?php
namespace defrindr\DISample\BangunDatar;

use defrindr\DISample\Base\BangunDatar;

class Segitiga extends BangunDatar
{
    protected $alas;
    protected $tinggi;

    public function luas()
    {
        return ($this->alas * $this->tinggi) / 2;
    }

    public function keliling()
    {
        return sqrt(pow($this->alas, 2) + pow($this->tinggi, 2)) + $this->tinggi + $this->alas;
    }
}

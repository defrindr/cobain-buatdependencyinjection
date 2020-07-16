<?php
require __DIR__ . '/../../vendor/autoload.php';
use defrindr\DISample\BangunDatar\Persegi;

class BelahKetupat extends Persegi
{
    protected $diagonal1;
    protected $diagonal2;
    protected $sisi;

    public function luas()
    {
        return ($this->diagonal1 * $this->diagonal2) / 2;
    }
}

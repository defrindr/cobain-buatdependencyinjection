<?php
require 'BangunDatarKu/BelahKetupat.php';

use defrindr\DISample\BangunDatar\Segitiga;
use defrindr\DISample\Component;
use PHPUnit\Framework\TestCase as TC;

class DIUnitTest extends TC
{
    /**
     * Register Component
     */
    public $component;

    public function __construct()
    {
        parent::__construct();
        
        $this->component = (new Component)->register([
            "segitiga" => Segitiga::class,
            "persegi" => '\defrindr\DISample\BangunDatar\Persegi',
            "belahKetupat" => BelahKetupat::class,
        ]);

    }

    public function testHelp()
    {
        $persegi = $this->component->persegi();
        $belahKetupat = $this->component->belahKetupat();
        $segitiga = $this->component->segitiga();

        $this->assertEquals($persegi->help(), ['sisi']);
        $this->assertEquals($belahKetupat->help(), ['diagonal1', 'diagonal2', 'sisi']);
        $this->assertEquals($segitiga->help(), ['alas', 'tinggi']);
    }

    public function testCalc()
    {
        $persegi = $this->component->persegi();
        $belahKetupat = $this->component->belahKetupat();
        $segitiga = $this->component->segitiga();

        $this->assertEquals($persegi->params([
            'sisi' => 5,
        ])->get('luas'), 25);
        $this->assertEquals($belahKetupat->params([
            'diagonal1' => 10,
            'diagonal2' => 10,
            'sisi' => 5
        ])->get('keliling'), 20);
        $this->assertEquals($belahKetupat->params([
            'diagonal1' => 10,
            'diagonal2' => 10,
            'sisi' => 5
        ])->get('luas'), 50);
        $this->assertEquals($segitiga->params([
            'alas' => 5,
            'tinggi' => 6,
        ])->get('luas'), 15);
    }

}

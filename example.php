<?php
require 'vendor/autoload.php';

use defrindr\DISample\Component;
use defrindr\DISample\BangunDatar\Persegi;
use defrindr\DISample\BangunDatar\Segitiga;

// Add New Class
class BelahKetupat extends Persegi
{
    protected $diagonal1;
    protected $diagonal2;
    protected $sisi;

    function luas(){
        return ($this->diagonal1 * $this->diagonal2) / 2 ;
    }
}


/**
 * Register Component
 */
$container = Component::register([
    "segitiga" => Segitiga::class,
    "persegi" => '\defrindr\DISample\BangunDatar\Persegi',
    "belahKetupat" => BelahKetupat::class,
    ]);

$segitiga = $container->load('persegi');
$segitiga->params([
    // 'diagonal1' => 3,
    // 'diagonal2' => 4,
    "sisi" => 5
]);

print_r($segitiga->get('keliling') . "\n");
print_r($segitiga->get('luas') . "\n");
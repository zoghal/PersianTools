<?php

require __DIR__ . '/vendor/autoload.php';


$res = \Zoghal\PersianTools\Tools\Number::isPersian('۱۲۳۴۲۱');
// $res = \Zoghal\PersianTools\Tools\Number::isPersian('5555');
// $res =  preg_match("/^[\x{06F0}-\x{06F9}]/iu", '۱۳۱۱۲۳۱۲');
var_dump($res);
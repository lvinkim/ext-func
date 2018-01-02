<?php
/**
 * Created by PhpStorm.
 * User: vinkim
 * Date: 26/12/2017
 * Time: 10:51 AM
 */

require __DIR__ . '/../vendor/autoload.php';

$array = [
    "abc"=>'123',
    'efg' => [
        '456',
        '789'=>'hij'
    ]
];

print_r($array);

$code = \Ryum\ExtFunc\code_of_array($array);

echo $code.PHP_EOL;

$code = '$array2 = '.$code.';';

eval($code);

print_r($array2);

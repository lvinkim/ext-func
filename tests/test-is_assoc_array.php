<?php
/**
 * Created by PhpStorm.
 * User: vinkim
 * Date: 15/12/2017
 * Time: 2:28 PM
 */

require __DIR__ . '/../vendor/autoload.php';

$array1 = [
    '1',
    '2'
];
$isAssoc = \Ryum\ExtFunc\is_assoc_array($array1);

echo (!$isAssoc ? '通过' : '不通过') . PHP_EOL;

$array1 = [
    '1' => '1',
    '2' => '2'
];
$isAssoc = \Ryum\ExtFunc\is_assoc_array($array1) . PHP_EOL;

echo ($isAssoc ? '通过' : '不通过') . PHP_EOL;

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
$isAssoc = \Lvinkim\ExtFunc\ExtArray::isAssocArray($array1);

assert(!$isAssoc);

$array1 = [
    '1' => '1',
    '2' => '2'
];
$isAssoc = \Lvinkim\ExtFunc\ExtArray::isAssocArray($array1);

assert($isAssoc);

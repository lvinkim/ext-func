<?php
/**
 * Created by PhpStorm.
 * User: vinkim
 * Date: 15/12/2017
 * Time: 2:40 PM
 */

require __DIR__ . '/../vendor/autoload.php';

$array1 = [];
for ($i = 0; $i < 10; $i++) {
    $array1[] = [
        'name' => uniqid(),
        'age' => rand(1, 100)
    ];
}

$result = \Lvinkim\ExtFunc\ExtArray::arraySortByKey($array1, 'name');
echo json_encode($result, JSON_PRETTY_PRINT) . PHP_EOL;

$result = \Lvinkim\ExtFunc\ExtArray::arraySortByKey($array1, 'age', SORT_ASC);
echo json_encode($result, JSON_PRETTY_PRINT) . PHP_EOL;

$result = \Lvinkim\ExtFunc\ExtArray::arraySortByKey($array1, 'age', SORT_ASC, SORT_STRING);
echo json_encode($result, JSON_PRETTY_PRINT) . PHP_EOL;

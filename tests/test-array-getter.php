<?php
/**
 * Created by PhpStorm.
 * User: lvinkim
 * Date: 2019/3/26
 * Time: 12:15 PM
 */

require __DIR__ . '/../vendor/autoload.php';

$array = [
    "address" => [
        "city" => "广州",
    ],
    "contact" => [
        "name" => "Foo",
        "age" => 123,
        "tags" => ["Fashion"],
    ],
    "version" => "v1.0",
];

$age = \Lvinkim\ExtFunc\ArrayGetter::getArrayNumber($array, "contact", "age");
printf("age is : %s\n", $age);

$city = \Lvinkim\ExtFunc\ArrayGetter::getArrayString($array, "address", "city");
printf("city is : %s\n", $city);

$tags = \Lvinkim\ExtFunc\ArrayGetter::getSubArray($array, "contact", "tags");
var_dump($tags);

<?php
/**
 * Created by PhpStorm.
 * User: vinkim
 * Date: 26/12/2017
 * Time: 10:44 AM
 */

require __DIR__ . '/../vendor/autoload.php';

$json = '{key: "value"}';

$array = \Lvinkim\ExtFunc\ExtJson::extJsonDecode($json);

var_dump($array);


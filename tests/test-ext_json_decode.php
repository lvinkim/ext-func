<?php
/**
 * Created by PhpStorm.
 * User: vinkim
 * Date: 26/12/2017
 * Time: 10:44 AM
 */

require __DIR__ . '/../vendor/autoload.php';

$json = '{key: "value"}';

$array = \Ryum\ExtFunc\ext_json_decode($json, true);

print_r($array);


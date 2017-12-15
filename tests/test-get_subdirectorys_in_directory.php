<?php
/**
 * Created by PhpStorm.
 * User: vinkim
 * Date: 15/12/2017
 * Time: 2:09 PM
 */

require __DIR__ . '/../vendor/autoload.php';

$path = __DIR__.'/../var/logs';
$files = \Ryum\ExtFunc\get_subdirectorys_in_directory($path);
print_r($files);


<?php
/**
 * Created by PhpStorm.
 * User: vinkim
 * Date: 15/12/2017
 * Time: 3:09 PM
 */


require __DIR__ . '/../vendor/autoload.php';

$path = __DIR__.'/../var/logs';
$files = \Ryum\ExtFunc\get_allfiles_in_directory($path);
print_r($files);

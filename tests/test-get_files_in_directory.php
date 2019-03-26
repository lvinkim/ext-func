<?php
/**
 * Created by PhpStorm.
 * User: vinkim
 * Date: 15/12/2017
 * Time: 2:03 PM
 */

require dirname(__DIR__) . '/vendor/autoload.php';

$path = dirname(__DIR__) . '/var';
$files = \Lvinkim\ExtFunc\ExtFile::getFilesInDirectory($path);
print_r($files);




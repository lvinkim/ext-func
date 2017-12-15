<?php
/**
 * Created by PhpStorm.
 * User: vinkim
 * Date: 15/12/2017
 * Time: 2:54 PM
 */

require __DIR__ . '/../vendor/autoload.php';

$filename = __DIR__.'/../var/huge-file.log';
$lines = \Ryum\ExtFunc\read_huge_file($filename);

foreach ($lines as $line){
    echo $line;
}

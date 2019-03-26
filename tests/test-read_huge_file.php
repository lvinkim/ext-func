<?php
/**
 * Created by PhpStorm.
 * User: vinkim
 * Date: 15/12/2017
 * Time: 2:54 PM
 */

use Lvinkim\ExtFunc\ExtFile;

require dirname(__DIR__) . '/vendor/autoload.php';

$fileName = dirname(__DIR__) . '/var/huge-file.log';
$lines = ExtFile::readHugeFile($fileName);

foreach ($lines as $line) {
    printf($line);
}

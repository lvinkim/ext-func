<?php
/**
 * Created by PhpStorm.
 * User: vinkim
 * Date: 15/12/2017
 * Time: 2:17 PM
 */

require __DIR__ . '/../vendor/autoload.php';

$directory = __DIR__ . '/../var/logs/create/by/more';
\Lvinkim\ExtFunc\ExtFile::createDirectory($directory);
echo is_dir($directory);
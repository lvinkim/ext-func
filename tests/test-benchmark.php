<?php
/**
 * Created by PhpStorm.
 * User: lvinkim
 * Date: 2019/3/26
 * Time: 11:13 AM
 */

require __DIR__ . '/../vendor/autoload.php';

$start = uniqid();
\Lvinkim\ExtFunc\Benchmark::mark($start);
\Lvinkim\ExtFunc\Benchmark::memory($start);

$map = [];
foreach (range(0, 1000000) as $value) {
    $map[$value] = $value;
}

sleep(3);

$end = uniqid();
$time = \Lvinkim\ExtFunc\Benchmark::elapsedTime($start, $end);
$memory = \Lvinkim\ExtFunc\Benchmark::elapsedMemory($start, $end);

printf("时间 {$time} 秒, 内存: {$memory}");
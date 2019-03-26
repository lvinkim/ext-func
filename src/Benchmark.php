<?php
/**
 * Created by PhpStorm.
 * User: lvinkim
 * Date: 2019/3/26
 * Time: 10:55 AM
 */

namespace Lvinkim\ExtFunc;


class Benchmark
{
    /**
     * 时间点
     * @var array
     */
    private static $times = [];

    /**
     * 内存占用点
     * @var array
     */
    private static $memories = [];

    /**
     * 时间打点
     * @param string $name
     */
    public static function mark(string $name)
    {
        self::$times[$name] = microtime(true);
    }

    /**
     * 计算两个时间打点之间的时间间隔
     * @param string $pointFrom
     * @param string $pointTo
     * @param int $decimals
     * @return float
     */
    public static function elapsedTime(string $pointFrom = '', string $pointTo = '', int $decimals = 4): float
    {
        if (!isset(self::$times[$pointFrom])) {
            return 0;
        }
        if (!isset(self::$times[$pointTo])) {
            self::mark($pointTo);
        }
        return round(self::$times[$pointTo] - self::$times[$pointFrom], $decimals);
    }

    /**
     * 内存占用打点
     * @param $name
     */
    public static function memory(string $name)
    {
        self::$memories[$name] = (!function_exists('memory_get_usage')) ? '0' : memory_get_usage();
    }

    /**
     * 计算两个占用点的内存大小
     * @param string $pointFrom
     * @param string $pointTo
     * @param int $decimals
     * @return string
     */
    public static function elapsedMemory(string $pointFrom = '', string $pointTo = '', $decimals = 4): string
    {

        if (!isset(self::$memories[$pointFrom])) {
            return '';
        }

        if (!isset(self::$memories[$pointTo])) {
            self::memory($pointTo);
        }

        $size = self::$memories[$pointTo] - self::$memories[$pointFrom];
        $unit = array('B', 'KB', 'MB', 'GB', 'TB', 'PB');

        return round($size / pow(1024, ($i = floor(log($size, 1024)))), $decimals) . ' ' . $unit[($i ?? 0)];

    }
}
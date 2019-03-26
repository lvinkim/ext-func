<?php
/**
 * Created by PhpStorm.
 * User: lvinkim
 * Date: 2019/3/26
 * Time: 9:40 AM
 */

namespace Lvinkim\ExtFunc;


class ArrayGetter
{
    /**
     * 获取数组中的元素，以 float 或 int 的类型返回
     * @param array $array
     * @param string ...$keys
     * @return float|int
     */
    public static function getArrayNumber(array $array, string  ...$keys): float
    {
        $count = count($keys);

        for ($i = 0; $i < $count; $i++) {
            $key = $keys[$i];
            if ($i == $count - 1) {
                $value = floatval($array[$key] ?? 0);
            } else {
                $array = (array)($array[$key] ?? []);
            }
        }

        return floatval($value ?? 0);

    }

    /**
     * 获取数组中的元素，以 string 的类型返回
     * @param array $array
     * @param string ...$keys
     * @return string
     */
    public static function getArrayString(array $array, string  ...$keys): string
    {
        $count = count($keys);

        for ($i = 0; $i < $count; $i++) {
            $key = $keys[$i];
            if ($i == $count - 1) {
                $value = strval($array[$key] ?? "");
            } else {
                $array = (array)($array[$key] ?? []);
            }
        }

        return strval($value ?? "");
    }

    /**
     * 获取数组中的子数组
     * @param array $array
     * @param string ...$keys
     * @return array
     */
    public static function getSubArray(array $array, string  ...$keys): array
    {
        $count = count($keys);

        for ($i = 0; $i < $count; $i++) {
            $key = $keys[$i];
            $array = (array)($array[$key] ?? []);
        }
        return $array;
    }
}
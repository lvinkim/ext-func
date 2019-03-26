<?php
/**
 * Created by PhpStorm.
 * User: lvinkim
 * Date: 2019/3/26
 * Time: 9:03 AM
 */

namespace Lvinkim\ExtFunc;


class ExtArray
{
    /**
     * 判断是否为关联数组
     * @param array $array
     * @return bool
     */
    public static function isAssocArray(array $array): bool
    {
        return array_keys($array) !== range(0, count($array) - 1);
    }

    /**
     * 对二维数组按某个 key 的值进行排序
     * @param array $array
     * @param string $columnName
     * @param int $type
     * @param int $flag
     * @return array
     */
    public static function arraySortByKey(array $array, string $columnName, int $type = SORT_DESC, int $flag = SORT_REGULAR)
    {
        usort($array, function ($former, $latter) use ($columnName, $type, $flag) {
            $formerEle = $former[$columnName] ?? '';
            $latterEle = $latter[$columnName] ?? '';

            if ($flag === SORT_NUMERIC) {
                $formerEle = floatval($formerEle);
                $latterEle = floatval($latterEle);
            } else if ($flag == SORT_STRING) {
                $formerEle = strval($formerEle);
                $latterEle = strval($latterEle);
            } else {
                null;
            }

            if ($type == SORT_DESC) {
                return $latterEle <=> $formerEle;
            } else {
                return $formerEle <=> $latterEle;
            }
        });

        return $array;
    }

}
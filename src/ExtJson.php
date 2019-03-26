<?php
/**
 * Created by PhpStorm.
 * User: lvinkim
 * Date: 2019/3/26
 * Time: 9:21 AM
 */

namespace Lvinkim\ExtFunc;


class ExtJson
{
    /**
     * 对于 key 值没有双引号的 json ，先将双引号补上
     * @param string $json
     * @param bool $mode
     * @param int $depth
     * @param int $options
     * @return mixed
     */
    public static function extJsonDecode(string $json, $mode = false, $depth = 512, $options = 0)
    {
        if (preg_match('/\w:/', $json)) {
            $json = preg_replace('/(\w+):/is', '"$1":', $json);
        }
        return json_decode($json, $mode, $depth, $options);
    }


}
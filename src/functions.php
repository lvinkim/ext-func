<?php
/**
 * Created by PhpStorm.
 * User: vinkim
 * Date: 09/12/2017
 * Time: 10:49 AM
 */

namespace Ryum\ExtFunc;

// 读取大文件
function read_huge_file($filepath)
{
    if (is_file($filepath)) {
        $handle = fopen($filepath, 'r');
        while ($handle && !feof($handle)) {
            while (($line = fgets($handle)) !== false) {
                yield $line;
            }
        }
    }
}

// 获取指定目录下的所有文件
function get_files_in_directory(string $directory)
{
    $files = [];
    if (is_dir($directory)) {
        $dirPath = dir($directory);
        while ($file = $dirPath->read()) {
            if ($file != "." && $file != "..") {
                if (is_file($directory . "/" . $file)) {
                    $files[] = pathinfo($file, PATHINFO_BASENAME);
                }
            }
        }
        $dirPath->close();
    }
    return $files;
}

// 获取指定目录下的所有子目录
function get_subdirectorys_in_directory(string $directory)
{
    $subdirectorys = [];
    if (is_dir($directory)) {
        $dirPath = dir($directory);
        while ($file = $dirPath->read()) {
            if ($file != "." && $file != "..") {
                if (is_dir($directory . "/" . $file)) {
                    $subdirectorys[] = pathinfo($file, PATHINFO_BASENAME);
                }
            }
        }
        $dirPath->close();
    }
    return $subdirectorys;
}

// 递归创建多级目录
function create_directory(string $directory, $mode = 0777)
{
    return is_dir($directory) || (create_directory(dirname($directory)) && mkdir($directory, $mode));
}

// 获取客户端 IP
function get_client_ip()
{
    if (getenv("HTTP_CLIENT_IP") && strcasecmp(getenv("HTTP_CLIENT_IP"), "unknown")) {
        $ip = getenv("HTTP_CLIENT_IP");
    } else if (getenv("HTTP_X_FORWARDED_FOR") && strcasecmp(getenv("HTTP_X_FORWARDED_FOR"), "unknown")) {
        $ip = getenv("HTTP_X_FORWARDED_FOR");
    } else if (getenv("REMOTE_ADDR") && strcasecmp(getenv("REMOTE_ADDR"), "unknown")) {
        $ip = getenv("REMOTE_ADDR");
    } else if (isset($_SERVER['REMOTE_ADDR']) && $_SERVER['REMOTE_ADDR'] && strcasecmp($_SERVER['REMOTE_ADDR'], "unknown")) {
        $ip = $_SERVER['REMOTE_ADDR'];
    } else {
        $ip = "unknown";
    }
    return ($ip);
}

// 判断是否为关联数组
function is_assoc_array(array $array)
{
    return array_keys($array) !== range(0, count($array) - 1);
}

// 对二维数据按某个 key 的值进行排序
function array_sort_by_key(array $array, $columnName, $type = SORT_DESC, $flags = SORT_REGULAR)
{
    usort($array, function ($former, $latter) use ($columnName, $type, $flags) {
        $formerEle = $former[$columnName] ?? '';
        $latterEle = $latter[$columnName] ?? '';

        if ($flags === SORT_NUMERIC) {
            $formerEle = floatval($formerEle);
            $latterEle = floatval($latterEle);
        } else if ($flags == SORT_STRING) {
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
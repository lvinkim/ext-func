<?php
/**
 * Created by PhpStorm.
 * User: lvinkim
 * Date: 2019/3/26
 * Time: 8:17 AM
 */

namespace Lvinkim\ExtFunc;


class ExtFile
{

    /**
     * 由头到尾逐行读取一个超大文件
     * @param string $filePath
     * @return \Generator|string[]
     */
    public static function readHugeFile(string $filePath): \Generator
    {
        if (is_readable($filePath)) {
            $handle = fopen($filePath, 'r');
            while ($handle && !feof($handle)) {
                while (($line = fgets($handle)) !== false) {
                    yield $line;
                }
            }
        }
    }

    /**
     * 获取目录下的所有文件名
     * @param string $directory
     * @return array
     */
    public static function getFilesInDirectory(string $directory): array
    {
        $files = [];
        if (is_dir($directory)) {
            $dirPath = dir($directory);
            while ($file = $dirPath->read()) {
                if ($file != "." && $file != "..") {
                    if (is_file($directory . DIRECTORY_SEPARATOR . $file)) {
                        $files[] = pathinfo($file, PATHINFO_BASENAME);
                    }
                }
            }
            $dirPath->close();
        }
        return $files;
    }

    /**
     * 获取目录下的子目录名
     * @param string $directory
     * @return array
     */
    public static function getSubDirectoriesInDirectory(string $directory): array
    {
        $subDirectories = [];
        if (is_dir($directory)) {
            $dirPath = dir($directory);
            while ($file = $dirPath->read()) {
                if ($file != "." && $file != "..") {
                    if (is_dir($directory . "/" . $file)) {
                        $subDirectories[] = pathinfo($file, PATHINFO_BASENAME);
                    }
                }
            }
            $dirPath->close();
        }
        return $subDirectories;
    }

    /**
     * 获取指定目录下的所有文件（包括所有子目录下的文件）
     * @param string $directory
     * @return array
     */
    public static function getAllFilesInDirectory(string $directory): array
    {
        $files = self::getFilesInDirectory($directory);
        $subDirectories = self::getSubDirectoriesInDirectory($directory);

        foreach ($subDirectories as $directoryName) {

            $subdirectory = $directory . DIRECTORY_SEPARATOR . $directoryName;
            $subdirectoryFiles = self::getAllFilesInDirectory($subdirectory);

            foreach ($subdirectoryFiles as $subdirectoryFile) {
                $files[] = $directoryName . DIRECTORY_SEPARATOR . $subdirectoryFile;
            }

        }

        return $files;
    }

    /**
     * 递归创建多级目录
     * @param string $directory
     * @param int $mode
     * @return bool
     */
    public static function createDirectory(string $directory, int $mode = 0777): bool
    {
        return is_dir($directory) || (self::createDirectory(dirname($directory)) && mkdir($directory, $mode));
    }
}
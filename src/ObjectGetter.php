<?php
/**
 * Created by PhpStorm.
 * User: lvinkim
 * Date: 2019/3/26
 * Time: 10:53 AM
 */

namespace Lvinkim\ExtFunc;


class ObjectGetter
{
    /**
     * 获取标准对象中的内部多级属性
     * @param $object
     * @param string ...$keys
     * @return string
     */
    public static function getDeepObjectString($object, string ...$keys): string
    {
        $count = count($keys);

        for ($i = 0; $i < $count; $i++) {
            $key = $keys[$i];
            if ($i == $count - 1) {
                $value = self::getObjectString($object, $key);
            } else {
                $object = self::getObjectProperty($object, $key);
            }
        }

        return strval($value ?? "");
    }

    /**
     * 获取标准对象中的属性值，并以 string 类型返回
     * @param $object
     * @param string $property
     * @return string
     */
    public static function getObjectString($object, string $property): string
    {
        $propertyValue = "";
        if (is_object($object)) {
            if (isset($object->{$property})) {
                $propertyValue = strval($object->{$property});
            }
        }

        return $propertyValue;
    }

    /**
     * 获取标准对象中的属性值，并以 float 类型返回
     * @param $object
     * @param string $property
     * @return float
     */
    public static function getObjectNumber($object, string $property): float
    {
        $propertyValue = 0.0;
        if (is_object($object)) {
            if (isset($object->{$property})) {
                $propertyValue = floatval($object->{$property});
            }
        }

        return $propertyValue;
    }

    /**
     * 获取标准对象中的属性值，并以 array 类型返回
     * @param $object
     * @param string $property
     * @return array
     */
    public static function getObjectArray($object, string $property): array
    {
        $propertyValue = [];
        if (is_object($object)) {
            if (isset($object->{$property})) {
                $propertyValue = (array)($object->{$property});
            }
        }

        return $propertyValue;
    }

    /**
     * 此方法用于保证能获取到 $object 变量的 $property 属性是 \stdClass 类型的
     * @param $object mixed
     * @param $property string
     * @return \stdClass
     */
    public static function getObjectProperty($object, string $property)
    {
        $propertyValue = new \stdClass();
        if (is_object($object)) {
            if (isset($object->{$property})) {
                if (is_object($object->{$property})) {
                    $propertyValue = $object->{$property};
                }
            }
        }

        return $propertyValue;
    }
}
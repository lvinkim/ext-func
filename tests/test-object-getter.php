<?php
/**
 * Created by PhpStorm.
 * User: lvinkim
 * Date: 2019/3/26
 * Time: 11:27 AM
 */

require __DIR__ . '/../vendor/autoload.php';

$object = new stdClass();
$object->version = "v1.0";
$object->address = new stdClass();
$object->address->city = "广州";
$object->contact = new stdClass();
$object->contact->name = "Foo";
$object->contact->age = 123;
$object->contact->tags = ["Fashion"];

$city = \Lvinkim\ExtFunc\ObjectGetter::getDeepObjectString($object, "address", "city");
printf("city is : %s\n", $city);

$street = \Lvinkim\ExtFunc\ObjectGetter::getDeepObjectString($object, "address", "street");
printf("street is : %s\n", $street);

$address = \Lvinkim\ExtFunc\ObjectGetter::getObjectProperty($object, "address");
var_dump($address);

$version = \Lvinkim\ExtFunc\ObjectGetter::getObjectString($object, "version");
printf("version is : %s\n", $version);

$contact = \Lvinkim\ExtFunc\ObjectGetter::getObjectProperty($object, "contact");
$age = \Lvinkim\ExtFunc\ObjectGetter::getObjectNumber($contact, "age");
printf("age is : %s\n", $age);

$tags = \Lvinkim\ExtFunc\ObjectGetter::getObjectArray($contact, "tags");
var_dump($tags);

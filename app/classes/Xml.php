<?php

/**
 * Class Xml
 */
class Xml
{
    /**
     * @param $array
     * @param SimpleXMLElement $object
     */
    public static function arrayToXml($array, SimpleXMLElement $object)
    {
        foreach ($array as $key => $value) {
            if (is_numeric($key)) {
                $key = strtok($value, " ");
            }

            if ($key == "Valid") {
                $object->addChild($key, (int)$value);
            } else {
                if (is_array($value)) {
                    $new_object = $object->addChild($key);
                    self::arrayToXml($value, $new_object);
                } else {
                    $object->addChild($key, $value);
                }
            }
        }
    }
}
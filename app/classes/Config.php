<?php

/**
 * Class Config
 */
class Config
{

    public static $items = [];

    public static function init()
    {
        static::$items = include('config/config.php');
    }

    /**
     * @return mixed
     */
    public static function getValidationFields()
    {
        return static::$items['validationFields'];
    }

    /**
     * @param $value
     * @return mixed
     */
    public static function isRequired($value)
    {
        $fields = self::getValidationFields();
        return $fields[$value]['require'];
    }

    /**
     * @param $key
     * @return mixed
     */
    public static function getError($key)
    {
        return static::$items['errors'][$key];
    }

    /**
     * @param $key
     * @return mixed
     */
    public static function getField($key)
    {
        return static::$items[$key];
    }
}
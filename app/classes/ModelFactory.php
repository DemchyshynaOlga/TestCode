<?php

require 'models/CardModel.php';
require 'models/ExpirationDateModel.php';
require 'models/Cvv2Model.php';
require 'models/EmailModel.php';
require 'models/PhoneModel.php';

/**
 * Class ModelFactory
 */
final class ModelFactory
{

    /**
     * @param $alias
     * @param null $value
     * @return null
     */
    static public function get($alias, $value = null)
    {
        $class = $alias . 'Model';
        if (class_exists($class)) {
            $instance = new $class($alias, $value);
        } else {
            $instance = null;
            throw new Exception("Model '{$alias}' could not be found");
        }

        return $instance;
    }
}
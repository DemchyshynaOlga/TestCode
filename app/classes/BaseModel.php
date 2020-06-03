<?php

/**
 * Class BaseModel
 */
abstract class BaseModel
{
    public $field;
    public $value;

    public function __construct($field, $value)
    {
        $this->field = $field;
        $this->value = $value;
    }

    /**
     * @return bool
     */
    protected function required()
    {
        return Config::isRequired($this->field);
    }

    /**
     * @param $key
     * @return string
     */
    protected function getError($key)
    {
        return ucfirst($this->field) . ' ' . Config::getError($key);
    }

    abstract public function validate();
}
<?php

/**
 * Class Algorithm
 */
abstract class Algorithm
{
    public $value;

    public function __construct($value)
    {
        $this->value = $value;
    }

    protected function getAlgorithm()
    {
    }
}
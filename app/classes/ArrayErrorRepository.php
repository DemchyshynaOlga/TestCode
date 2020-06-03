<?php

/**
 * Class ArrayErrorRepository
 */
class ArrayErrorRepository implements ErrorRepositoryInterface
{
    private $errors = [];

    /**
     * @param $error
     */
    public function set($error)
    {
        $this->errors[] = $error;
    }

    /**
     * @return array
     */
    public function get()
    {
        return $this->errors;
    }
}
<?php

/**
 * Class RegisterErrorHandler
 */
class RegisterErrorHandler
{
    private $errors;

    public function __construct(ErrorRepositoryInterface $errors)
    {
        $this->errors = $errors;
    }

    /**
     * @param $error
     */
    public function handle($error)
    {
        $this->errors->set($error);
    }
}
<?php

/**
 * Interface ErrorRepositoryInterface
 */
interface ErrorRepositoryInterface
{
    public function set($error);

    public function get();
}
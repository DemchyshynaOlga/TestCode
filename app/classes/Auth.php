<?php

/**
 * Class Auth
 */
class Auth
{
    /**
     * @param $userKey
     * @return bool
     */
    public static function check($userKey)
    {
        return $userKey == Helper::generateHash();
    }
}
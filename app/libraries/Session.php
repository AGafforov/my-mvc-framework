<?php

namespace app\libraries;

/**
 * Class Session
 *
 * @package app\libraries
 */
class Session
{
    /**
     * Session constructor.
     */
    function __construct()
    {
        session_start();
    }

    /**
     * Gets session value by key
     *
     * @param null $key
     * @param null $defaultValue
     *
     * @return null
     */
    public function get($key = null, $defaultValue = null)
    {
        if ($key) {
            return $_SESSION[$key] ?? $defaultValue;
        }

        return $_SESSION;
    }

    /**
     * Sets new session
     *
     * @param $key
     * @param $value
     */
    public function set($key, $value)
    {
        $_SESSION[$key] = $value;
    }

    /**
     * Checks existing of session by key
     *
     * @param $key
     *
     * @return bool
     */
    public function has($key)
    {
        return isset($_SESSION[$key]);
    }

    /**
     * Removes session by key
     *
     * @param $key
     */
    public function remove($key)
    {
        if (self::has($key)) {
            unset($_SESSION[$key]);
        }
    }
}

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
     *
     * @return null
     */
    public function get($key = null)
    {
        if ($key) {
            return $_SESSION[$key] ?? null;
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
}

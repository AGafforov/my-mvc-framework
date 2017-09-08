<?php

namespace app\libraries;

/**
 * Class Request
 *
 * @package app\libraries
 */
class Request
{
    private $getParams;
    private $postParams;

    /**
     * Request constructor.
     */
    function __construct()
    {
        $this->getParams  = count($_GET) ? $_GET : null;
        $this->postParams = count($_POST) ? $_POST : null;
    }

    /**
     * @param null $param
     * @param null $default
     *
     * @return null
     */
    public function get($param = null, $default = null)
    {
        if ($param) {
            return $this->getParams[$param] ?? $default;
        }

        return $this->getParams;
    }

    /**
     * @param null $param
     * @param null $default
     *
     * @return null
     */
    public function post($param = null, $default = null)
    {
        if ($param) {
            return $this->postParams[$param] ?? $default;
        }

        return $this->postParams;
    }
}

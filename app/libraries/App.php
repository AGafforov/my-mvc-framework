<?php

namespace app\libraries;

/**
 * Class App
 *
 * @package app\libraries
 */
class App
{
    /**
     * @var $router Router
     */
    private static $router;

    /**
     * @var $request Request
     */
    private static $request;

    /**
     * @var $session
     */
    private static $session;

    /**
     * @var $connection Connection
     */
    private static $connection;

    /**
     * Builds application.
     *
     * @param $request
     * @param $config
     */
    public static function build($request, $config)
    {
        try {
            // Connection to DB
            self::$connection = new Connection($config);
            if (!self::$connection->isConnected()) {
                throw new \Exception("Connection to db is failed.");
            }

            // Session
            self::$session = new Session();

            // Request
            self::$request = new Request();

            // Execute requested controller
            self::$router = new Router($request, $config);
            self::$router->route();
        } catch (\Exception $exception) {
            print_r($exception);
        }
    }

    /**
     * @return Router
     */
    public static function getRouter()
    {
        return self::$router;
    }

    /**
     * @return Request
     */
    public static function getRequest()
    {
        return self::$request;
    }

    /**
     * @return Session
     */
    public static function getSession()
    {
        return self::$session;
    }

    /**
     * @return null|\PDO
     */
    public static function getConnection()
    {
        if (self::$connection->isConnected()) {
            return self::$connection->getConnection();
        }

        return null;
    }
}

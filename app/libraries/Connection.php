<?php

namespace app\libraries;

/**
 * Class Connection
 *
 * @package app\libraries
 */
class Connection
{
    /**
     * Current connection.
     *
     * @var null|\PDO
     */
    private $connection = null;

    /**
     * @var bool
     */
    private $isConnected = false;

    /**
     * Connection constructor.
     *
     * @param $config
     */
    function __construct($config)
    {
        try {
            $dbConfig = $config['db'] ?? null;
            if (!$dbConfig) {
                throw new \Exception("Please, specify configuration of db.");
            }

            $dsn      = $dbConfig['dsn'];
            $username = $dbConfig['username'];
            $password = $dbConfig['password'];

            $this->connection  = new \PDO($dsn, $username, $password);
            $this->isConnected = true;
        } catch (\Exception $ex) {
            echo $ex->getMessage();
            echo $ex->getTraceAsString();
        }
    }

    /**
     * @return null|\PDO
     */
    public function getConnection()
    {
        return $this->connection;
    }

    /**
     * @return bool
     */
    public function isConnected()
    {
        return $this->isConnected;
    }
}

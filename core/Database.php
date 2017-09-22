<?php

namespace Adi\Core;

use PDO;

/**
 * Singleton pattern.
 */
class Database
{
    protected $_pdo;

    /**
     * Create/return singleton instance of PDO.
     *
     * @param array $config
     */
    protected function __construct($config)
    {
        if (!$this->_pdo)
        {
            $this->_pdo = $this->_connect($config);
        }

        return $this->_pdo;
    }

    /**
     * Execute database query.
     *
     * @param string $query
     * @param array  $parameters
     */
    protected function query(string $query, array $parameters = [])
    {
        if ($this->_pdo && !empty($query))
        {
            try {
                $stmt = $this->_pdo->prepare($query);

                if (!empty($parameters))
                {
                    $stmt->execute($parameters);
                }
                else
                {
                    $stmt->execute();
                    return $stmt->fetchAll(PDO::FETCH_CLASS);
                }
            }
            catch (PDOException $e)
            {
                die('Failed to execute query : ' . $e->getMessage());
            }
        }
    }

    /**
     * Connect to database using PDO.
     *
     * @param  array    $config
     * @return /PDO()
     */
    private function _connect($config)
    {
        try {
            return new PDO($config['dsn'] . 'dbname=' . $config['dbname'],
                $config['username'],
                $config['password'],
                $config['options']
            );
        }
        catch (PDOException $e)
        {
            die('Database connection failed : ' . $e->getMessage());
        }
    }
}

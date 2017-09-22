<?php

namespace Adi\Core;

use Adi\Core\Database;

class DatabaseQueries extends Database
{
    /**
     * Create/initialize PDO instance.
     */
    public function __construct($config)
    {
        parent::__construct($config);
        return $this;
    }

    /**
     * Execute SELECT * query
     *
     * @param string $table
     */
    public function selectAll($table)
    {
        return $this->query("SELECT * FROM {$table}");
    }

    /**
     * Execute INSERT INTO query.
     *
     * @param string $table
     * @param array  $parameters
     */
    public function insert($table, $parameters)
    {
        $query = sprintf(
            'INSERT INTO %s (%s) VALUES (%s)',
            $table,
            implode(', ', array_keys($parameters)),
            implode(', ', $this->prepareParams($parameters))
        );

        $this->query($query, $parameters);
        return $this->_pdo->lastInsertId();
    }

    /**
     * To attach colon ":" before every parameter array key.
     * @param  array   $parameters
     * @return array
     */
    private function prepareParams($parameters)
    {
        return array_map(function ($param)
        {
            return ":{$param}";
        }, array_keys($parameters));
    }
}

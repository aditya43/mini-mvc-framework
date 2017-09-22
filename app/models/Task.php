<?php

namespace Adi\Models;

use Adi\Core\DatabaseQueries;

class Task
{
    protected $_db;

    /**
     * Initialize singleton PDO instance.
     *
     * @param DatabaseQueries $database
     */
    public function __construct(DatabaseQueries $database)
    {
        $this->_db = $database;
    }

    /**
     * Store new task.
     *
     * @param string $table_name
     * @param array  $data
     */
    public function store(string $table_name, array $data)
    {
        return $this->_db->insert($table_name, $data);
    }

    /**
     * Fetch all tasks.
     *
     * @param string $table_name [description]
     */
    public function selectAll(string $table_name)
    {
        return $this->_db->selectAll($table_name);
    }
}

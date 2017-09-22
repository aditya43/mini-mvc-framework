<?php

/**
 * Global config array.
 *
 * @var array
 */
return $config = [
    'database' => [
        'dsn'      => 'mysql:host=127.0.0.1;',
        'dbname'   => 'adi_tasks_mvc',
        'username' => 'root',
        'password' => '',
        'options'  => [
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_ERRMODE    => PDO::ERRMODE_EXCEPTION
        ]
    ]
];

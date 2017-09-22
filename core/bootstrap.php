<?php

use Adi\Core\App;
use Adi\Core\DatabaseQueries;

/**
 * Perform initial binds into global IOC container.
 */
App::bind('config', require 'config.php');
App::bind('doc_root', 'http://localhost/learn/php/MVC/adi/');
App::bind('database', new DatabaseQueries(App::get('config')['database']));

/**
 * Load requested view.
 *
 * @param  string $name View name
 * @param  array  $data View params
 * @return bool   true if view file exists, else return false.
 */
function view($name, $data = [])
{
    extract($data);
    $file = "app/views/{$name}.view.php";
    if (file_exists($file))
    {
        require $file;
        return true;
    }
    return false;
}

/**
 * Redirect helper function
 *
 * @param string $path Where to redirect.
 */
function redirect($path)
{
    header('Location: ' . App::get('doc_root') . $path);
    return true;
    exit;
}

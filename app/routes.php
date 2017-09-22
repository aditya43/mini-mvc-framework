<?php

/**
 * Define all GET, POST routes in here.
 */
$router->get('', 'PagesController@home');
$router->get('about', 'PagesController@about');
$router->get('tasks', 'TasksController@index');
$router->post('tasks', 'TasksController@store');

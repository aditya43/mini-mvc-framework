<?php

namespace Adi\Core;

class Router
{
    /**
     * Routes container.
     *
     * @var array
     */
    private $_routes = [
        'GET'  => [],
        'POST' => []
    ];

    /**
     * Load routes.
     *
     * @param string $routes_file Path to routes file.
     */
    public static function load($routes_file)
    {
        $router = new static();
        require $routes_file;
        return $router;
    }

    /**
     * Process GET request.
     *
     * @param string $uri
     * @param string $controller
     */
    public function get($uri, $controller)
    {
        $this->_routes['GET'][$uri] = $controller;
    }

    /**
     * Process POST request.
     *
     * @param string $uri
     * @param string $controller
     */
    public function post($uri, $controller)
    {
        $this->_routes['POST'][$uri] = $controller;
    }

    /**
     * Direct incoming request to controller@method.
     *
     * @param string $uri
     * @param string $requestType
     */
    public function direct($uri, $requestType)
    {
        if (array_key_exists($uri, $this->_routes[$requestType]))
        {
            return $this->callAction(...explode('@', $this->_routes[$requestType][$uri]));
        }
        throw new Exception("No route defined for this uri : " . $uri, 1);
    }

    /**
     * Call method (action) defined in controller.
     *
     * @param string $controller
     * @param string $action
     */
    private function callAction($controller, $action)
    {
        $controller = "Adi\\Controllers\\{$controller}";
        $controller = new $controller();
        if (!method_exists($controller, $action))
        {
            throw new Exception("{$controller} does not respond to the {$action} action.", 1);
        }
        return $controller->$action();
    }
}

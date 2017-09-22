<?php

namespace Adi\Core;

/**
 * Parse incoming request.
 */
class Request
{
    /**
     * Parse request URI.
     *
     * @return string Trimmed URI.
     */
    public static function uri()
    {
        $parsed_uri  = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $request_uri = str_replace('/learn/php/MVC/adi/', '', $parsed_uri);
        return trim($request_uri, '/');
    }

    /**
     * Identify request method (GET, POST).
     */
    public static function method()
    {
        return $_SERVER['REQUEST_METHOD'];
    }
}

<?php

namespace Adi\Core;

/**
 * Global App IOC (Inversion Of Control) container.
 */
class App
{
    private static $registery = [];

    /**
     * Add/bind new entry.
     *
     * @param string $key
     * @param mix    $value
     */
    public static function bind($key, $value)
    {
        static::$registery[$key] = $value;
    }

    /**
     * Fetch entry from container.
     *
     * @param  string $key
     * @return mix
     */
    public static function get($key)
    {
        if (!array_key_exists($key, static::$registery))
        {
            throw new Exception("No {$key} is bound in the container", 1);
        }
        return static::$registery[$key];
    }
}

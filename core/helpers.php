<?php

/**
 * Require a view.
 *
 * @param string $name
 * @param array  $data
 */
if (!function_exists('view')) {
    function view(string $name, $data = [])
    {
        $name = str_replace('.', '/', $name);
        extract($data);

        return require "app/views/{$name}.view.php";
    }
}

/**
 * Redirect to a new page.
 *
 * @param string $path
 */
if (!function_exists('redirect')) {
    function redirect($path)
    {
        header('Location: ' . $path);
        die();
    }
}

/**
 * Die dump.
 *
 * @param mixed $var
 */
if (!function_exists('dd')) {
    function dd($var)
    {
        var_dump($var);
        die();
    }
}

/**
 * Get environment
 */
if (!function_exists('env')) {
    function env($key, $default = null)
    {
        $val = null;

        if (isset($_SERVER[$key])) {
            $val = $_SERVER[$key];
        } elseif (isset($_ENV[$key])) {
            $val = $_ENV[$key];
        } elseif (getenv($key) !== false) {
            $val = getenv($key);
        }

        if ($val !== null) {
            return $val;
        }

        return $default;
    }
}
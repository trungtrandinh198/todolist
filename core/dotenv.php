<?php

define('PATH_ENV', dirname(__DIR__) . '/.env');

class DotEnv
{
    /**
     * The directory where the .env file can be located.
     *
     * @var string
     */
    protected $path;

    public function __construct($path)
    {
        if (!file_exists($path)) {
            throw new \InvalidArgumentException(sprintf('%s does not exist', $path));
        }
        $this->path = $path;
    }

    public function load()
    {
        if (!is_readable($this->path)) {
            throw new \RuntimeException(sprintf('%s file is not readable', $this->path));
        }

        $lines = file($this->path, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

        foreach ($lines as $line) {

            if (strpos(trim($line), '#') === 0) {
                continue;
            }

            list($name, $value) = explode('=', $line, 2);
            $name = trim($name);

            $value = $this->parseValue(trim($value));

            if (!array_key_exists($name, $_SERVER) && !array_key_exists($name, $_ENV)) {
                putenv(sprintf('%s=%s', $name, $value));
                $_ENV[$name]    = $value;
                $_SERVER[$name] = $value;
            }
        }
    }

    private function parseValue($value)
    {

        switch ($value) {
            case 'empty':
            case 'EMPTY':
            case 'Empty':
            case '(empty)':
                return '';

            case 'null':
            case 'NULL':
            case 'Null':
            case '(null)':
                return null;

            case 'true':
            case '(true)':
            case 'True':
            case 'TRUE':
                return true;

            case 'false':
            case '(false)':
            case 'False':
            case 'FALSE':
                return false;

            default:
                return $value;
        }
    }
}

if (file_exists(PATH_ENV)) {
    (new DotEnv(PATH_ENV))->load();
}
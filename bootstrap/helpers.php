<?php

if (!function_exists('require_file')) {
    function require_file(string $path): mixed
    {
        return require getcwd() . DIRECTORY_SEPARATOR . ltrim($path, DIRECTORY_SEPARATOR);
    }
}

if (!function_exists('env')) {
    function env(string $key, mixed $default = null): mixed
    {
        $value = $_ENV[$key] ?? $default;

        if (is_numeric($value)) {
            return $value;
        }

        $boolValue = filter_var($value,FILTER_VALIDATE_BOOL, FILTER_NULL_ON_FAILURE);

        return $boolValue ?? $value;
    }
}
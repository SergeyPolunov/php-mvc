<?php

use Dotenv\Repository\RepositoryBuilder;

if (!function_exists('require_file')) {
    function require_file(string $path): mixed
    {
        return require getcwd() . DIRECTORY_SEPARATOR . ltrim($path, DIRECTORY_SEPARATOR);
    }
}

if (!function_exists('env')) {
    function env(string $key, mixed $default = null): mixed
    {
        static $repository;

        if ($repository === null) {
            $repository = RepositoryBuilder::createWithDefaultAdapters()
                ->immutable()
                ->make();
        }

        $value = $repository->get($key);

        if ($value === null) {
            return $default;
        }

        if (is_numeric($value)) {
            return +$value;
        }

        return match ($value) {
            'true' => true,
            'false' => false,
            'null' => $default
        };
    }
}

if (!function_exists('config')) {
    function config(string $file): array
    {
        return require_file('config' . DIRECTORY_SEPARATOR . ltrim($file, DIRECTORY_SEPARATOR));
    }
}

if (!function_exists('path')) {
    function path(string $path): string
    {
        return getcwd() . DIRECTORY_SEPARATOR . ltrim($path, DIRECTORY_SEPARATOR);
    }
}

if (!function_exists('safe_var')) {
    function safe_var(mixed $value, mixed $default): string
    {
        return $value ?? $default;
    }
}

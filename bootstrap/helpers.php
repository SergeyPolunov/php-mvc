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
        static $repository;

        if ($repository === null) {
            $repository = \Dotenv\Repository\RepositoryBuilder::createWithDefaultAdapters()
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

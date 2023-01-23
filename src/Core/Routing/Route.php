<?php

declare(strict_types=1);

namespace Core\Routing;

/**
 * @method static self get(string $url, mixed $action)
 * @method static self post(string $url, mixed $action)
 * @method static self put(string $url, mixed $action)
 * @method static self patch(string $url, mixed $action)
 * @method static self delete(string $url, mixed $action)
 */
class Route
{
    private const AVAILABLE_METHODS = ['get', 'post', 'put', 'patch', 'delete'];

    public function __construct(private string $method, private string $url, private $action)
    {
    }

    public static function __callStatic(string $name, array $arguments): Route
    {
        if (in_array($name, self::AVAILABLE_METHODS)) {
            return new self(strtoupper($name), ...$arguments);
        }
    }

    public function getMethod(): string
    {
        return $this->method;
    }

    public function getUrl(): string
    {
        return $this->url;
    }

    public function getAction(): mixed
    {
        return $this->action;
    }
}

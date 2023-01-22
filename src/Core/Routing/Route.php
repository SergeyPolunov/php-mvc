<?php

declare(strict_types=1);

namespace Core\Routing;

class Route
{
    public function __construct(private string $method, private string $url, private $action)
    {
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

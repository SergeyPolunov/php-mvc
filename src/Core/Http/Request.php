<?php

declare(strict_types=1);

namespace Core\Http;

class Request
{
    public function __construct(private array $server)
    {
    }

    public function getUrlPath(): string
    {
        $pieces = explode('?', $this->server['REQUEST_URI']);
        return $pieces[0] ?? '/';
    }

    public function getMethod(): string
    {
        return $this->server['REQUEST_METHOD'] ?? 'GET';
    }
}

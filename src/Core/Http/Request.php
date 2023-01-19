<?php

declare(strict_types=1);

namespace Core\Http;

class Request
{
    private ?array $parsedUrl;

    public function __construct(array $server)
    {
        $this->parseServer($server);
    }

    private function parseServer(array $server): void
    {
        $url = sprintf('%s://%s%s', $server['REQUEST_SCHEME'], $server['HTTP_HOST'], $server['REQUEST_URI']);
        $this->parsedUrl = parse_url($url);
    }

    public function getPath(): string
    {
        return $this->parsedUrl['path'] ?? '';
    }
}

<?php

declare(strict_types=1);

namespace Core\Http;

class Response
{
    public function __construct(private string $content, private int $status = 200)
    {
    }

    public function send(): void
    {
        http_response_code($this->status);

        echo $this->content;
    }
}

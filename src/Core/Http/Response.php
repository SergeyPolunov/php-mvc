<?php

declare(strict_types=1);

namespace Core\Http;

class Response
{

    public function __construct(private string $content)
    {
    }

    public function send(): void
    {
        echo $this->content;
    }
}

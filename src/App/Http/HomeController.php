<?php

declare(strict_types=1);

namespace App\Http;

use Core\Http\Response;

class HomeController
{
    public function __invoke(): Response
    {
        return new Response('home');
    }
}

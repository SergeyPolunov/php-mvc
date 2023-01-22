<?php

declare(strict_types=1);

namespace App\Http;

use Core\Http\Response;

class UsersController
{
    public function show(): Response
    {
        return new Response('get_users');
    }

    public function create(): Response
    {
        return new Response('post_users');
    }
}

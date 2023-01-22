<?php

declare(strict_types=1);

namespace App\Http;

use Core\Http\Response;

class PostsController
{
    public function show(): Response
    {
        return new Response('get posts');
    }
}

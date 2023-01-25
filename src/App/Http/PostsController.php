<?php

declare(strict_types=1);

namespace App\Http;

use Core\Http\Response;
use Core\View\View;

class PostsController
{
    public function show(): Response
    {
        $view = new View();
        return new Response(
            $view->render('home.php', [
                'title' => 'Posts',
                'content' => 'Posts page'
            ])
        );
    }
}

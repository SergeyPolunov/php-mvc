<?php

declare(strict_types=1);

namespace App\Http;

use Core\Http\Response;
use Core\View\View;

class HomeController
{
    public function __invoke(): Response
    {
        $view = new View();
        return new Response(
            $view->render('home.php', [
                'title' => 'Home',
                'content' => 'content home page',
            ])
        );
    }
}

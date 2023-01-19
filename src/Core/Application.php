<?php

declare(strict_types=1);

namespace Core;

use Core\Http\Request;
use Core\Http\Response;

class Application
{
    public function handle(Request $request): Response
    {
        return new Response($request->getPath());
    }
}

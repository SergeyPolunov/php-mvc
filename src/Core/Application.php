<?php

declare(strict_types=1);

namespace Core;

use Core\Http\Request;
use Core\Http\Response;
use Core\Routing\Exceptions\InvalidRouteAction;
use Core\Routing\Exceptions\RouteNotFound;
use Core\Routing\Router;

class Application
{
    private Router $router;

    public function __construct()
    {
        $this->router = new Router();
    }

    public function handle(Request $request): Response
    {
        try {
            $response = $this->router->run($request);

            return $this->wrapRouterResponse($response);
        } catch (InvalidRouteAction | RouteNotFound) {
            return new Response('Page not found', 404);
        }
    }

    private function wrapRouterResponse(mixed $response): Response
    {
        if ($response instanceof Response) {
            return $response;
        }

        return new Response((string)$response);
    }
}

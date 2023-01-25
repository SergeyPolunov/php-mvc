<?php

declare(strict_types=1);

namespace Core;

use Core\Http\Request;
use Core\Http\Response;
use Core\Routing\Exceptions\RoutingException;
use Core\Routing\Router;
use Throwable;

class Application
{
    private Router $router;

    public function __construct(private array $config)
    {
        $this->router = new Router(
            require_file('routes/web.php')
        );
    }

    public function handle(Request $request): Response
    {
        try {
            $response = $this->router->run($request);

            return $this->wrapResponse($response);
        } catch (Throwable $exception) {
            return $this->handleException($exception);
        }
    }

    private function wrapResponse(mixed $response): Response
    {
        if ($response instanceof Response) {
            return $response;
        }

        return new Response((string)$response);
    }

    private function handleException(Throwable $exception): Response
    {
        if ($this->config['debug']) {
            throw $exception;
        }

        if ($exception instanceof RoutingException) {
            return new Response('Page not found', 404);
        }

        return new Response($exception->getMessage(), 500);
    }
}

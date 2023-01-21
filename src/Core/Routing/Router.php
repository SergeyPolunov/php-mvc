<?php

declare(strict_types=1);

namespace Core\Routing;

use Core\Http\Request;
use Core\Routing\Exceptions\InvalidRouteAction;
use Core\Routing\Exceptions\RouteNotFound;

class Router
{
    private array $routes = [];

    public function __construct()
    {
        $this->routes = require getcwd() . '/routes/web.php';
    }

    /** @throws RouteNotFound
     * @throws InvalidRouteAction
     */
    public function run(Request $request): mixed
    {
        $urlPath = $request->getUrlPath();
        $method = $request->getMethod();

        $route = $this->findRoute($method, $urlPath);

        if (is_callable($route['action'])) {
            return $route['action']();
        }

        throw new InvalidRouteAction();
    }

    /** @throws RouteNotFound */
    private function findRoute(string $method, string $url): array
    {
        foreach ($this->routes as $route) {
            if ($route['url'] === $url && $route['method'] === $method) {
                return $route;
            }
        }

        throw new RouteNotFound();
    }
}

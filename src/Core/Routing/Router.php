<?php

declare(strict_types=1);

namespace Core\Routing;

use Core\Http\Request;
use Core\Routing\Exceptions\InvalidRouteAction;
use Core\Routing\Exceptions\RouteNotFound;

class Router
{
    /**
     * Router constructor.
     * @param Route[] $routes
     */
    public function __construct(private array $routes)
    {
        $this->routes = $this->validateRoutes($this->routes);
    }

    public function validateRoutes(array $routes): array
    {
        return array_values(
            array_filter($routes, fn($n) => $n instanceof Route)
        );
    }

    /** @throws RouteNotFound
     * @throws InvalidRouteAction
     */
    public function run(Request $request): mixed
    {
        $urlPath = $request->getUrlPath();
        $method = $request->getMethod();

        $route = $this->findRoute($method, $urlPath);
        $action = $route->getAction();

        if (is_array($action) && count($action) === 1) {
            return (new $action[0])();
        }

        if (is_array($action) && count($action) === 2) {
            return (new $action[0])->{$action[1]}();
        }

        if (is_callable($action)) {
            return $action();
        }

        throw new InvalidRouteAction();
    }

    /** @throws RouteNotFound */
    private function findRoute(string $method, string $urlPath): Route
    {
        $urlPath = $urlPath === '/' ? $urlPath : rtrim($urlPath, '/');

        foreach ($this->routes as $route) {
            if ($route->getUrl() === $urlPath && $route->getMethod() === $method) {
                return $route;
            }
        }

        throw new RouteNotFound();
    }
}

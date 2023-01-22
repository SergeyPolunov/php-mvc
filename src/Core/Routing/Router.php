<?php

declare(strict_types=1);

namespace Core\Routing;

use Core\Http\Request;
use Core\Routing\Route;
use Core\Routing\Exceptions\InvalidRouteAction;
use Core\Routing\Exceptions\RouteNotFound;

class Router
{
    /** @var Route[]  */
    private array $routes;

    public function __construct()
    {
        $this->routes = $this->validateRoutes(require getcwd() . '/routes/web.php');
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

        if (is_callable($route->getAction())) {
            return $route->getAction()();
        }

        throw new InvalidRouteAction();
    }

    /** @throws RouteNotFound */
    private function findRoute(string $method, string $urlPath): Route
    {
        foreach ($this->routes as $route) {
            if ($route->getUrl() === $urlPath && $route->getMethod() === $method) {
                return $route;
            }
        }

        throw new RouteNotFound();
    }
}

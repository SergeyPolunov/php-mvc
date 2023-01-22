<?php

use Core\Http\Response;
use Core\Routing\Route;

return [
    new Route(
        'GET',
        '/users/',
        function () {
            return new Response('get_users');
        }
    ),
    new Route(
        'POST',
        '/users/',
        function () {
            return new Response('post_users');
        }
    ),
    new Route(
        'GET',
        '/posts/',
        function () {
            return new Response('posts');
        }
    )
];

<?php

use Core\Routing\Route;
use App\Http\UsersController;
use App\Http\PostsController;

return [
    new Route('GET','/users', [UsersController::class, 'show']),
    new Route('POST','/users', [UsersController::class, 'create']),
    new Route('GET','/posts', [PostsController::class, 'show']),
];

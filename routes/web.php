<?php

use Core\Routing\Route;
use App\Http\UsersController;
use App\Http\PostsController;
use App\Http\HomeController;

return [
    Route::get('/users', [UsersController::class, 'show']),
    Route::post('/users', [UsersController::class, 'create']),
    Route::get('/posts', [PostsController::class, 'show']),
    Route::get('/', [HomeController::class]),
];

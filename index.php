<?php

require __DIR__ . '/vendor/autoload.php';

use Core\Application;
use Core\Http\Request;

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

$application = new Application(
    env('APP_DEBUG',false)
);

$request = new Request($_SERVER);

$response = $application->handle($request);

$response->send();

<?php

require __DIR__ . '/vendor/autoload.php';

use Core\Application;
use Core\Http\Request;

$application = new Application();

$request = new Request($_SERVER);

$response = $application->handle($request);

$response->send();
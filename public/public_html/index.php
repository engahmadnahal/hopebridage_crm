<?php

define('LARAVEL_START', microtime(true));
require '../hopebridge/vendor/autoload.php';

$app = require_once '../hopebridge/bootstrap/app.php';


$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);
$response = $kernel->handle(
    $request = Illuminate\Http\Request::capture()
);
$response->send();
$kernel->terminate($request, $response);


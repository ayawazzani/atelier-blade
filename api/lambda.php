<?php

// 1. Load the Laravel Application
$app = require __DIR__ . '/../bootstrap/app.php';

// 2. FORCE Storage to use /tmp (The only writable folder on Vercel)
$app->useStoragePath('/tmp/storage');

// 3. Run the Application (Standard Laravel 8 Logic)
$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);

$response = $kernel->handle(
    $request = Illuminate\Http\Request::capture()
);

$response->send();

$kernel->terminate($request, $response);
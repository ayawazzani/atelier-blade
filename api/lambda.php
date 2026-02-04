<?php

// 1. CRITICAL: Load the Autoloader (This fixes the "Class not found" error)
require __DIR__ . '/../vendor/autoload.php';

// 2. Load the Laravel Application
$app = require __DIR__ . '/../bootstrap/app.php';

// 3. FORCE Storage to use /tmp (The only writable folder on Vercel)
$app->useStoragePath('/tmp/storage');

// 4. Run the Application (Standard Laravel 8 Logic)
$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);

$response = $kernel->handle(
    $request = Illuminate\Http\Request::capture()
);

$response->send();

$kernel->terminate($request, $response);
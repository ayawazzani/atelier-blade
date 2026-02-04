<?php

// 1. Load the Autoloader
require __DIR__ . '/../vendor/autoload.php';

// 2. FORCE Laravel to look for cache files in /tmp (The writable folder)
// This fixes the "bootstrap/cache directory must be writable" error
putenv('APP_CONFIG_CACHE=/tmp/config.php');
putenv('APP_SERVICES_CACHE=/tmp/services.php');
putenv('APP_PACKAGES_CACHE=/tmp/packages.php');
putenv('APP_ROUTES_CACHE=/tmp/routes.php');
putenv('VIEW_COMPILED_PATH=/tmp');
putenv('CACHE_DRIVER=array'); // Disable file cache for safety
putenv('LOG_CHANNEL=stderr'); // Send logs to console

// 3. Load the Application
$app = require __DIR__ . '/../bootstrap/app.php';

// 4. Force Storage Path to /tmp
$app->useStoragePath('/tmp/storage');

// 5. Run the Application
$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);

$response = $kernel->handle(
    $request = Illuminate\Http\Request::capture()
);

$response->send();

$kernel->terminate($request, $response);
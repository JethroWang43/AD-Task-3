<?php
require __DIR__ . '/bootstrap.php';

if (php_sapi_name() === 'cli-server') {
    $urlPath = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    $file = BASE_PATH . $urlPath;
    if (is_file($file)) {
        return false; // Let the built-in server handle the request for static files
    }
}

require BASE_PATH . '/index.php';
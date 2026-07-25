<?php
/**
 * Custom router untuk php -S
 * Handle static files langsung (tanpa boot Laravel)
 * sehingga request JS/CSS/font di-serve instan
 */
$uri = urldecode(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));

// Serve static files dari public/ langsung
$staticExtensions = ['js', 'css', 'png', 'jpg', 'jpeg', 'gif', 'ico', 'svg', 'woff', 'woff2', 'ttf', 'eot', 'map'];
$ext = strtolower(pathinfo($uri, PATHINFO_EXTENSION));

if (in_array($ext, $staticExtensions)) {
    $file = __DIR__ . '/public' . $uri;
    if (file_exists($file)) {
        $mimeTypes = [
            'js'    => 'application/javascript',
            'css'   => 'text/css',
            'png'   => 'image/png',
            'jpg'   => 'image/jpeg',
            'jpeg'  => 'image/jpeg',
            'gif'   => 'image/gif',
            'ico'   => 'image/x-icon',
            'svg'   => 'image/svg+xml',
            'woff'  => 'font/woff',
            'woff2' => 'font/woff2',
            'ttf'   => 'font/ttf',
            'eot'   => 'application/vnd.ms-fontobject',
            'map'   => 'application/json',
        ];
        header('Content-Type: ' . ($mimeTypes[$ext] ?? 'application/octet-stream'));
        header('Cache-Control: public, max-age=31536000'); // 1 tahun cache untuk assets
        header('Vary: Accept-Encoding');
        readfile($file);
        return true;
    }
}

// Pass ke Laravel untuk dynamic requests
require __DIR__ . '/public/index.php';

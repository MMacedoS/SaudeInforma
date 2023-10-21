<?php

if (!isset($_SESSION)) {
    session_start();
}

spl_autoload_register(function ($instancia) {
    $directories = [
        'Controller' => __DIR__ . '/../Controllers/',
        'Model' => __DIR__ . '/../Model/',
        'Routers' => __DIR__ . '/../Routers/'
    ];

    foreach ($directories as $directory) {
        $filePath = $directory . $instancia . '.php';
        if (file_exists($filePath)) {
            require $filePath;
            return;
        }
    }
});
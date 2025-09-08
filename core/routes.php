<?php

    $routes = [
        'inicio' => 'main@index',
        'loja' => 'main@store',
        'carrinho' => 'store@cart',
    ];

    $action = 'inicio';

    if (isset($_GET['a']) && array_key_exists($_GET['a'], $routes)) {
        $action = $_GET['a'];
    }

    $parts = explode('@', $routes[$action]);

    $controller = ucfirst($parts[0]);
    $controller = 'core\\controllers\\' . $controller . '\\' . $controller;
    
    $method = $parts[1];

    $controller = new $controller();
    $controller->$method();
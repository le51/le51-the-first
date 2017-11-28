<?php

$router = $di->getRouter();

// Define your routes here
$router->add(
    '/auth',
    [
        'controller' => 'index',
        'action'     => 'auth',
    ]
);
$router->add(
    '/about',
    [
        'controller' => 'index',
        'action'     => 'about',
    ]
);
$router->handle();

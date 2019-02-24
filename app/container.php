<?php

use App\Controllers\ApiController;
// Create DIC
$container = $app->getContainer();

$container['view'] = function ($container) {
    return new \Slim\Views\PhpRenderer('./templates/');
};

$container['ApiController'] = function($c) {
    $view = $c->get('view');
    return new ApiController($view);
};
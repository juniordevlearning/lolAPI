<?php

use App\Controllers\HomeController;
use App\LolApi;

// Create DIC
$container = $app->getContainer();

$container['view'] = function ($container) {
    return new \Slim\Views\PhpRenderer('./templates/');
};

$container['LolApi'] = function($c) {
    $guzzle = new GuzzleHttp\Client();
    return new LolApi($guzzle);
};

$container['HomeController'] = function($c) {
    $api = $c->get('LolApi');
    $view = $c->get('view');
    return new HomeController($view, $api);
};
<?php
require './vendor/autoload.php';

$config['displayErrorDetails'] = true;
$config['addContentLengthHeader'] = false;

$app = new \Slim\App(['settings' => $config]);

include './app/container.php';
include './app/routes.php';

$app->run();

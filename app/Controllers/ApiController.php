<?php

namespace App\Controllers;

use Slim\Http\Request;
use Slim\Http\Response;

class ApiController
{
    private $view;

    public function __construct($view)
    {
        $this->view = $view;
    }

    public function index(Request $request, Response $response, $args)
    {
        return $this->view->render($response, 'home.php', $args);
    }
}
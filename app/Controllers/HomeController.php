<?php

namespace App\Controllers;

use Slim\Http\Request;
use Slim\Http\Response;

class HomeController
{
    private $view;
    private $api;

    public function __construct($view, $api)
    {
        $this->view = $view;
        $this->api = $api;
    }

    public function index(Request $request, Response $response, $args)
    {
        return $this->view->render($response, 'home.php', $args);
    }

    public function show(Request $request, Response $response, $args)
    {
        $league = htmlspecialchars($request->getParam('league'));
        $region = htmlspecialchars($request->getParam('region'));
        $queueType = htmlspecialchars($request->getParam('queueType'));

        $args['players'] = $this->getChallangerPlayers(
            $league,
            $region, 
            $queueType
        );

        return $this->view->render($response, 'home.php', $args);
    }

    private function getChallangerPlayers($league, $region, $queueType)
    {
        $players = $this->api->getPlayers($league, $region, $queueType);

        return $players;
    }
}
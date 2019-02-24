<?php

namespace App;

use GuzzleHttp\Client;


class LolApi
{
    private $regions = [
        'BR' => 'br1.api.riotgames.com',
        'EUNE' => 'eun1.api.riotgames.com',
        'EUW' => 'euw1.api.riotgames.com'
    ];
    private $leagues = [
        'challanger' => '/lol/league/v4/challengerleagues/by-queue/',
        'grandmaster' => '/lol/league/v4/grandmasterleagues/by-queue/',
        'master' => '/lol/league/v4/masterleagues/by-queue/'
    ];
    private $queues = [
        'solo_5x5' => 'RANKED_SOLO_5x5',
        'flex_team' => 'RANKED_FLEX_SR',
        'flex' => 'RANKED_FLEX_TT'
    ];
    private $topPlayers = [];
    private $apiKey = '?api_key=RGAPI-9740ed0d-485a-453d-a037-9f39d2dfa78d';
    private $client;

    public function __construct($guzzle)
    {
        $this->client = $guzzle;
    }

    public function getPlayers($league, $region, $queue)
    {
        $url = $this->urlBuilder($league, $region, $queue);
        $response = $this->client->request('GET', $url);

        $result = json_decode($response->getBody()->getContents(), ture);
        $players = $result['entries'];
        $this->setTopPlayers($players);

        return $this->topPlayers;
    }

    private function setTopPlayers($orderSet)
    {
        // fill topPlayers
        for ($i = 0; $i < 200; $i++) {
            $this->topPlayers[$i] = $orderSet[$i];
        }

        // loop over topPlayers array
        // compare each players leaguePoints with each topPlayer
        // if players league points are higer put him in
        // if player allready in top players go to next player
        foreach ($orderSet as $key => $player) {
            foreach ($this->topPlayers as $topKey => $topPlayer) {
                $result = $topPlayer['leaguePoints'] <=> $player['leaguePoints'];
                if ($result === -1) {
                    $this->topPlayers[$topKey] = $player;
                    break;
                }
            }
        }
    }

    private function urlBuilder($league, $region, $queue)
    {
        $regionEndpoint = $this->getEndpointByRegion($region);
        $leagueUri = $this->getUriByLeague($league);
        $queueType = $this->getQueueType($queue);
        $apiKey = $this->apiKey;

        return "https://".$regionEndpoint.$leagueUri.$queueType.$apiKey;
    }

    private function getQueueType($queue)
    {
        if (array_key_exists($queue, $this->queues)) {
            return $this->queues[$queue];
        }
        return "Queues undeffined";
    }

    private function getUriByLeague($league)
    {
        if (array_key_exists($league, $this->leagues)) {
            return $this->leagues[$league];
        }
        return "League undeffined";
    }

    private function getEndpointByRegion($region)
    {
        if (array_key_exists($region, $this->regions)) {
            return $this->regions[$region];
        }
        return "Region undeffined";
    }
}
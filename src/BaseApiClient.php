<?php

namespace Armandsar\BetVictorBroccoli;

use GuzzleHttp\Client;
use Illuminate\Contracts\Config\Repository;

abstract class BaseApiClient
{
    protected $baseUrl;
    private $client;

    public function __construct(Client $client, Repository $config)
    {
        $this->baseUrl = $config->get('betvictor_broccoli.base_url');
        $this->client = $client;
    }

    protected function get($endpoint, $options = [])
    {
        $response = $this->request('GET', $endpoint, $options)->getBody()->getContents();

        return json_decode($response, true);
    }

    private function request($method, $endpoint, $options)
    {
        $allOptions = [
            'query' => $options
        ];

        return $this->client->request($method, $this->buildURL($endpoint), $allOptions);
    }

    private function buildURL($endpoint)
    {
        return $this->baseUrl . '/' . $endpoint;
    }
}

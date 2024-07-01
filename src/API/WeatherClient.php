<?php

namespace App\API;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

class WeatherClient implements WeatherInterface
{
    private const string HOST = 'https://api.weatherapi.com/v1/current.json';

    private Client $client;

    public function __construct(
        private readonly string $apiKey
    ) {
        $this->client = new Client();
    }

    /**
     * @param string $query
     *
     * @return array
     * @throws GuzzleException
     */
    public function request(string $query): array
    {
        $endpoint = self::HOST . '?' . http_build_query(['key' => $this->apiKey, 'q' => $query]);
        $response = $this->client->get($endpoint);

        return json_decode($response->getBody()->getContents(), true);
    }
}

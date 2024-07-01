<?php

namespace App;

use App\API\WeatherClient;
use App\API\WeatherInterface;
use App\DTOs\WeatherDTO;
use GuzzleHttp\Exception\GuzzleException;

class Weather
{
    private string $location;
    private WeatherInterface $weather;

    public function __construct(
        private readonly string $apiKey
    ) {
        $this->weather = new WeatherClient($this->apiKey);
    }

    public function location(string $location): self
    {
        $this->location = $location;

        return $this;
    }

    public function getWeather(): WeatherDTO
    {
        try {
            $data = $this->weather->request($this->location);
        } catch (GuzzleException $exception) {
            echo $exception->getMessage();
            exit(1);
        }

        return (new WeatherDTO())
            ->setCelsius($data['current']['temp_c'] ?? 0)
            ->setFahrenheit($data['current']['temp_f'] ?? 0);
    }
}
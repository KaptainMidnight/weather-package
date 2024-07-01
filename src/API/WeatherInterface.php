<?php

namespace App\API;

interface WeatherInterface
{
    public function request(string $query): array;
}
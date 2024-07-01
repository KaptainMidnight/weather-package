<?php

namespace App\DTOs;

final class WeatherDTO
{
    private float|int $fahrenheit;
    private float|int $celsius;

    public function setFahrenheit(float|int $fahrenheit): self
    {
        $this->fahrenheit = $fahrenheit;

        return $this;
    }

    public function setCelsius(float|int $celsius): self
    {
        $this->celsius = $celsius;

        return $this;
    }

    public function getFahrenheit(): float|int
    {
        return $this->fahrenheit;
    }

    public function getCelsius(): float|int
    {
        return $this->celsius;
    }
}
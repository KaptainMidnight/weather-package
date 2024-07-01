# Получение погоды для определенной локации

### Установка

```shell
composer require kaptainmidnight/weather-package
```

## Использование

```php
<?php

use KaptainMidnight\WeatherPackage\Weather;

$apiKey = '************';
$weather = new Weather($apiKey);

$weather = $weather->location('Moscow')->get();

echo "Погода по Фарингейту: {$weather->getFahrenheit()}";
echo "Погода в цельсиях: {$weather->getCelsius()}";
```
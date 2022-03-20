<?php
/**
 * Copyright © OpenGento, All rights reserved.
 * See LICENSE bundled with this library for license details.
 */
declare(strict_types=1);

namespace Opengento\Snowflake\Service;

use Cmfcmf\OpenWeatherMap;
use Http\Adapter\Guzzle6\Client as GuzzleAdapter;
use Http\Factory\Guzzle\RequestFactory;
use Opengento\Snowflake\Model\Config\Snowflake;

class OpenWeatherMapApi
{
    // Manage all Group 6xx: Snow
    // https://openweathermap.org/weather-conditions
    public const WEATHER_CONDITION = 'snow';

    // Language of data (try your own language here!):
    protected string $lang = 'en';

    // Units (can be 'metric' or 'imperial' [default]):
    protected string $units = 'metric';

    protected Snowflake $config;

    public function __construct(
        Snowflake $config
    ) {
        $this->config = $config;
    }

    /**
     * @throws OpenWeatherMap\Exception
     */
    public function isSnowing(string $lat, string $lon): bool
    {
        $apiKey = $this->config->getApiKey();

        $httpRequestFactory = new RequestFactory();
        $httpClient = GuzzleAdapter::createWithConfig([]);

        $owm = new OpenWeatherMap($apiKey, $httpClient, $httpRequestFactory);

        $weather = $owm->getWeather(['lat' => $lat, 'lon' => $lon], $this->lang, $this->units);

        return static::WEATHER_CONDITION === $weather->weather->description;
    }
}

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
use Opengento\Snowflake\Model\Config\OpenWeather as OpenWeatherConfig;

/**
 * @api
 */
class OpenWeatherMapApi
{
    /** Manage all Group 6xx: Snow: https://openweathermap.org/weather-conditions */
    public const WEATHER_CONDITION = 'snow';

    /** Language of data (try your own language here!):*/
    private string $lang = 'en';

    /** Units (can be 'metric' or 'imperial' [default]):*/
    private string $units = 'metric';

    private OpenWeatherConfig $openWeatherConfig;

    public function __construct(
        OpenWeatherConfig $openWeatherConfig
    ) {
        $this->openWeatherConfig = $openWeatherConfig;
    }

    /**
     * @throws OpenWeatherMap\Exception
     */
    public function isSnowing(string $lat, string $lon): bool
    {
        $httpRequestFactory = new RequestFactory();
        $httpClient = GuzzleAdapter::createWithConfig([]);

        $owm = new OpenWeatherMap($this->openWeatherConfig->getApiKey(), $httpClient, $httpRequestFactory);

        $weather = $owm->getWeather(['lat' => $lat, 'lon' => $lon], $this->lang, $this->units);

        return self::WEATHER_CONDITION === $weather->weather->description;
    }
}

<?php
/**
 * Copyright © OpenGento, All rights reserved.
 * See LICENSE bundled with this library for license details.
 */
declare(strict_types=1);

namespace Opengento\Snowflake\ViewModel;

use Magento\Framework\View\Element\Block\ArgumentInterface;
use Opengento\Snowflake\Model\Config\OpenWeather as OpenWeatherConfig;
use Opengento\Snowflake\Model\Config\Snowflake as SnowflakeConfig;

final class Snowflake implements ArgumentInterface
{
    private SnowflakeConfig $snowflakeConfig;

    private OpenWeatherConfig $openWeatherConfig;

    public function __construct(
        SnowflakeConfig $snowflakeConfig,
        OpenWeatherConfig $openWeatherConfig
    ) {
        $this->snowflakeConfig = $snowflakeConfig;
        $this->openWeatherConfig = $openWeatherConfig;
    }

    public function getSnowflakeChar(): string
    {
        return $this->snowflakeConfig->getSnowflakeChar();
    }

    public function getSnowflakeVSpeed(): float
    {
        return $this->snowflakeConfig->getSnowflakeVSpeed();
    }

    public function getSnowflakeHSpeed(): float
    {
        return $this->snowflakeConfig->getSnowflakeHSpeed();
    }

    public function getSnowflakeRotSpeed(): int
    {
        return $this->snowflakeConfig->getSnowflakeRotSpeed();
    }

    public function getSnowflakeQty(): int
    {
        return $this->snowflakeConfig->getSnowflakeQty();
    }

    public function getSnowflakeMinSize(): int
    {
        return $this->snowflakeConfig->getSnowflakeMinSize();
    }

    public function getSnowflakeMaxSize(): int
    {
        return $this->snowflakeConfig->getSnowflakeMaxSize();
    }

    public function isForceSnow(): bool
    {
        return $this->snowflakeConfig->isForceSnow();
    }

    public function isApiEnabled(): bool
    {
        return $this->openWeatherConfig->isEnabled();
    }

    public function getIpLocatorApiUrl(): string
    {
        return $this->openWeatherConfig->getIpLocatorApiUrl();
    }
}

<?php
/**
 * Copyright © OpenGento, All rights reserved.
 * See LICENSE bundled with this library for license details.
 */
declare(strict_types=1);

namespace Opengento\Snowflake\Model\Config;

use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Store\Model\ScopeInterface;

class Snowflake
{
    public const AJAX_URL = 'opengento_snowflake/index/meteo';

    private const CONFIG_PATH_SNOWFLAKE_ENABLE = 'opengento/snowflake/enable';
    private const CONFIG_PATH_SNOWFLAKE_CHAR  = 'snowflake/general/icon';
    private const CONFIG_PATH_SNOWFLAKE_V_SPEED  = 'snowflake/general/vspeed';
    private const CONFIG_PATH_SNOWFLAKE_H_SPEED  = 'snowflake/general/hspeed';
    private const CONFIG_PATH_SNOWFLAKE_ROT_SPEED  = 'snowflake/general/rotspeed';
    private const CONFIG_PATH_SNOWFLAKE_OPENWEATHERMAP_API_KEY = 'opengento/snowflake/api_key';
    private const CONFIG_PATH_SNOWFLAKE_MIN_SIZE = 'snowflake/general/max_size';
    private const CONFIG_PATH_SNOWFLAKE_MAX_SIZE = 'snowflake/general/min_size';
    private const CONFIG_PATH_SNOWFLAKE_QTY = 'snowflake/general/qty';
    private const CONFIG_PATH_SNOWFLAKE_FORCE = 'snowflake/api/force';

    private ScopeConfigInterface $scopeConfig;

    public function __construct(ScopeConfigInterface $scopeConfig)
    {
        $this->scopeConfig = $scopeConfig;
    }

    public function isEnabled(?int $scopeId = null): bool
    {
        return $this->scopeConfig->isSetFlag(self::CONFIG_PATH_SNOWFLAKE_ENABLE, ScopeInterface::SCOPE_STORE, $scopeId);
    }

    public function getSnowflakeChar(?int $scopeId = null): string
    {
        return $this->scopeConfig->getValue(self::CONFIG_PATH_SNOWFLAKE_CHAR, ScopeInterface::SCOPE_STORE, $scopeId) ?? '';
    }

    public function getSnowflakeVSpeed(?int $scopeId = null): string
    {
        return $this->scopeConfig->getValue(self::CONFIG_PATH_SNOWFLAKE_V_SPEED, ScopeInterface::SCOPE_STORE, $scopeId) ?? '';
    }

    public function getSnowflakeHSpeed(?int $scopeId = null): string
    {
        return $this->scopeConfig->getValue(self::CONFIG_PATH_SNOWFLAKE_H_SPEED, ScopeInterface::SCOPE_STORE, $scopeId) ?? '';
    }

    public function getSnowflakeRotSpeed(?int $scopeId = null): string
    {
        return $this->scopeConfig->getValue(self::CONFIG_PATH_SNOWFLAKE_ROT_SPEED, ScopeInterface::SCOPE_STORE, $scopeId) ?? '';
    }

    public function getSnowflakeQty(?int $scopeId = null): string
    {
        return $this->scopeConfig->getValue(self::CONFIG_PATH_SNOWFLAKE_QTY, ScopeInterface::SCOPE_STORE, $scopeId) ?? '';
    }

    public function getSnowflakeMinSize(?int $scopeId = null): string
    {
        return $this->scopeConfig->getValue(self::CONFIG_PATH_SNOWFLAKE_MIN_SIZE, ScopeInterface::SCOPE_STORE, $scopeId) ?? '';
    }

    public function getSnowflakeMaxSize(?int $scopeId = null): string
    {
        return $this->scopeConfig->getValue(self::CONFIG_PATH_SNOWFLAKE_MAX_SIZE, ScopeInterface::SCOPE_STORE, $scopeId) ?? '';
    }

    public function getSnowflakeForce(?int $scopeId = null): string
    {
        return (string)$this->scopeConfig->getValue(self::CONFIG_PATH_SNOWFLAKE_FORCE, ScopeInterface::SCOPE_STORE, $scopeId);
    }

    public function getApiKey(?int $scopeId = null): string
    {
        return $this->scopeConfig->getValue(
            self::CONFIG_PATH_SNOWFLAKE_OPENWEATHERMAP_API_KEY,
            ScopeInterface::SCOPE_STORE,
            $scopeId
        );
    }

    public function getAjaxUrl(): string
    {
        return static::AJAX_URL;
    }
}

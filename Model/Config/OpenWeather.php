<?php
/**
 * Copyright © OpenGento, All rights reserved.
 * See LICENSE bundled with this library for license details.
 */
declare(strict_types=1);

namespace Opengento\Snowflake\Model\Config;

use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Store\Model\ScopeInterface;

/**
 * @api
 */
final class OpenWeather
{
    private const CONFIG_PATH_SNOWFLAKE_OPENWEATHERMAP_ENABLED = 'snowflake/api/enable';
    private const CONFIG_PATH_SNOWFLAKE_OPENWEATHERMAP_API_KEY = 'snowflake/api/api_key';
    private const CONFIG_PATH_SNOWFLAKE_IP_LOCATOR_API_URL = 'snowflake/api/ip_info_api_url';

    private ScopeConfigInterface $scopeConfig;

    public function __construct(ScopeConfigInterface $scopeConfig)
    {
        $this->scopeConfig = $scopeConfig;
    }

    public function isEnabled(?int $scopeId = null): bool
    {
        return $this->scopeConfig->isSetFlag(
            self::CONFIG_PATH_SNOWFLAKE_OPENWEATHERMAP_ENABLED,
            ScopeInterface::SCOPE_STORE,
            $scopeId
        );
    }

    public function getApiKey(?int $scopeId = null): string
    {
        return (string)$this->scopeConfig->getValue(
            self::CONFIG_PATH_SNOWFLAKE_OPENWEATHERMAP_API_KEY,
            ScopeInterface::SCOPE_STORE,
            $scopeId
        );
    }

    public function getIpLocatorApiUrl(?int $scopeId = null): string
    {
        return (string)$this->scopeConfig->getValue(
            self::CONFIG_PATH_SNOWFLAKE_IP_LOCATOR_API_URL,
            ScopeInterface::SCOPE_STORE,
            $scopeId
        );
    }
}

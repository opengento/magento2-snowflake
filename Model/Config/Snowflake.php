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
    private const CONFIG_PATH_SNOWFLAKE_ENABLE = 'opengento/snowflake/enable';
    private const CONFIG_PATH_SNOWFLAKE_OPENWEATHERMAP_API_KEY = 'opengento/snowflake/api_key';

    private ScopeConfigInterface $scopeConfig;

    public function __construct(ScopeConfigInterface $scopeConfig)
    {
        $this->scopeConfig = $scopeConfig;
    }

    public function isEnabled(?int $scopeId = null): bool
    {
        return $this->scopeConfig->isSetFlag(self::CONFIG_PATH_SNOWFLAKE_ENABLE, ScopeInterface::SCOPE_STORE, $scopeId);
    }

    public function getApiKey(?int $scopeId = null): string
    {
        return $this->scopeConfig->getValue(self::CONFIG_PATH_SNOWFLAKE_OPENWEATHERMAP_API_KEY, ScopeInterface::SCOPE_STORE, $scopeId);
    }
}

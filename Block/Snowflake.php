<?php
/**
 * Copyright © OpenGento, All rights reserved.
 * See LICENSE bundled with this library for license details.
 */
declare(strict_types=1);

namespace Opengento\Snowflake\Block;

use Magento\Framework\View\Element\Template;
use Magento\Framework\App\Config\ScopeConfigInterface;
use Opengento\Snowflake\Model\Config\Snowflake as SnowflakeConfig;

class Snowflake extends Template
{
    protected SnowflakeConfig $snowflakeConfig;
    protected ScopeConfigInterface $scopeConfig;

    public function __construct(
        Template\Context $context,
        SnowflakeConfig $snowflakeConfig,
        array $data = []
    ) {
        $this->snowflakeConfig = $snowflakeConfig;
        parent::__construct($context, $data);
    }

    public function getSnowflakeChar(): string
    {
        return $this->snowflakeConfig->getSnowflakeChar();
    }

    public function getSnowflakeVSpeed(): string
    {
        return $this->snowflakeConfig->getSnowflakeVSpeed();
    }

    public function getSnowflakeHSpeed(): string
    {
        return $this->snowflakeConfig->getSnowflakeHSpeed();
    }

    public function getSnowflakeRotSpeed(): string
    {
        return $this->snowflakeConfig->getSnowflakeRotSpeed();
    }

    public function getSnowflakeQty(): int
    {
        return (int)$this->snowflakeConfig->getSnowflakeQty();
    }

    public function getSnowflakeMinSize(): int
    {
        return (int)$this->snowflakeConfig->getSnowflakeMinSize();
    }

    public function getSnowflakeMaxSize(): int
    {
        return (int)$this->snowflakeConfig->getSnowflakeMaxSize();
    }

    public function isForceSnow(): bool
    {
        return $this->snowflakeConfig->isForceSnow();
    }

    public function isApiEnable(): bool
    {
        return $this->snowflakeConfig->isApiEnable();
    }

    public function getAjaxUrl(): string
    {
        return $this->snowflakeConfig->getAjaxUrl();
    }
}

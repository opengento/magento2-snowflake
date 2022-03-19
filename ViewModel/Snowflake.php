<?php
/**
 * Copyright © OpenGento, All rights reserved.
 * See LICENSE bundled with this library for license details.
 */
declare(strict_types=1);

namespace Opengento\Snowflake\ViewModel;

use Magento\Framework\View\Element\Block\ArgumentInterface;
use Opengento\Snowflake\Model\Config\Snowflake as SnowflakeConfig;

final class Snowflake implements ArgumentInterface
{
    private SnowflakeConfig $snowflakeConfig;

    public function __construct(SnowflakeConfig $snowflakeConfig)
    {
        $this->snowflakeConfig = $snowflakeConfig;
    }

    public function getSnowflakeIcon() : string
    {
        return $this->snowflakeConfig->getIcon();
    }
}

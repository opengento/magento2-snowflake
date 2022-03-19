<?php
declare(strict_types=1);

namespace Opengento\Snowflake\Block;

use Magento\Framework\View\Element\Template;
use Magento\Framework\App\Config\ScopeConfigInterface;
use Opengento\Snowflake\Model\Config\Snowflake as SnowflakeConfig;

class Snowflake extends Template
{
    protected ScopeConfigInterface $snowflakeConfig;
    protected SnowflakeConfig $config;

    public function __construct(
        ScopeConfigInterface $scopeConfig,
        SnowflakeConfig $snowflakeConfig,
        Template\Context $context,
        array $data = []
    ) {
        $this->SnowflakeConfig = $snowflakeConfig;
        $this->scopeConfig = $scopeConfig;
        parent::__construct($context, $data);
    }

    public function getSnowflakeChar() : string
    {
        return $this->SnowflakeConfig->getSnowflakeChar();
    }

    public function getSnowflakeVSpeed() : string
    {
        return $this->SnowflakeConfig->getSnowflakeVSpeed();
    }

    public function getSnowflakeHSpeed() : string
    {
        return $this->SnowflakeConfig->getSnowflakeHSpeed();
    }
}

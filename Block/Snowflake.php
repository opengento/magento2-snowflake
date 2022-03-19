<?php
declare(strict_types=1);

namespace Opengento\Snowflake\Block;

use Magento\Framework\View\Element\Template;
use Magento\Framework\App\Config\ScopeConfigInterface;

class Snowflake extends Template
{
    const SNOWFLAKE_CHAR = 'snowflake/general/icon';

    /**
     * @var ScopeConfigInterface
     */
    protected $config;

    public function __construct(
        ScopeConfigInterface $scopeConfig,
        Template\Context $context,
        array $data = []
    ) {
        $this->scopeConfig = $scopeConfig;
        parent::__construct($context, $data);
    }

    public function getSnowflakeChar() : string
    {
        return $this->scopeConfig->getValue(self::SNOWFLAKE_CHAR, ScopeConfigInterface::SCOPE_TYPE_DEFAULT) ?? '';
    }
}

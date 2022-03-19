<?php

declare(strict_types=1);

namespace Opengento\Snowflake\Helper;

use Magento\Framework\App\Helper\AbstractHelper;
use Magento\Store\Model\ScopeInterface;

class Data extends AbstractHelper
{
    const XML_PATH_CONF = 'opengento/';

    public function getConfig($code, $storeId = null)
    {
        return $this->getConfigValue(self::XML_PATH_CONF . 'snowflake/' . $code, $storeId);
    }

    public function getConfigValue($field, $storeId = null)
    {
        return $this->scopeConfig->getValue($field, ScopeInterface::SCOPE_STORE, $storeId);
    }

    public function getConfigFlag($code, $storeId = null)
    {
        return $this->scopeConfig->isSetFlag(
            self::XML_PATH_CONF . 'snowflake/' . $code,
            ScopeInterface::SCOPE_STORE,
            $storeId
        );
    }
}

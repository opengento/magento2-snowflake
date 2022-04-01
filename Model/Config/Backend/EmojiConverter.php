<?php
/**
 * Copyright © OpenGento, All rights reserved.
 * See LICENSE bundled with this library for license details.
 */
declare(strict_types=1);

namespace Opengento\Snowflake\Model\Config\Backend;

use Magento\Framework\App\Config\Data\ProcessorInterface;
use Magento\Framework\App\Config\Value;

class EmojiConverter extends Value implements ProcessorInterface
{
    public function beforeSave(): self
    {
        $this->setValue(json_encode($this->getValue()));

        return parent::beforeSave();
    }

    public function processValue($value): string
    {
        return (string)json_decode($value);
    }
}

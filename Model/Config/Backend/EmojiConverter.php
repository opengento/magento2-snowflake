<?php
declare(strict_types = 1);

namespace Opengento\Snowflake\Model\Config\Backend;

use Magento\Config\Model\Config\Backend\Serialized\ArraySerialized;

class EmojiConverter extends \Magento\Framework\App\Config\Value  implements \Magento\Framework\App\Config\Data\ProcessorInterface
{
    /**
     * Unset array element with '__empty' key
     *
     * @return $this
     */
    public function beforeSave()
    {
        $this->setValue(json_encode($this->getValue()));
        return parent::beforeSave();
    }

    public function processValue($value)
    {
        return json_decode($value);
    }
}

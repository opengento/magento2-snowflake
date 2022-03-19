<?php
declare(strict_types = 1);

namespace Opengento\Snowflake\Observer;


use Magento\Framework\Event\ObserverInterface;
use Magento\Framework\Event\Observer as EventObserver;
use Magento\Framework\App\RequestInterface;
use Magento\Framework\App\Config\Storage\WriterInterface;

class EmojiConverter implements ObserverInterface
{
    const XML_PATH_ICON = 'snowflake/general/icon';

    /**
     * @var RequestInterface
     */
    private $request;

    /**
     * ConfigChange constructor.
     *
     * @param RequestInterface $request
     * @param WriterInterface  $configWriter
     */
    public function __construct(
        RequestInterface $request,
        WriterInterface $configWriter
    ) {
        $this->request      = $request;
        $this->configWriter = $configWriter;

    }

    public function execute(EventObserver $observer)
    {
        $params = $this->request->getParam('groups');

        $this->configWriter->save(
            self::XML_PATH_ICON,
            $this->emojiToUnicode($params['general']['fields']['icon']['value'])
        );

        return $this;
    }

    private function emojiToUnicode($emoji)
    {
        return '&#'.hexdec(bin2hex(mb_convert_encoding("$emoji", 'UTF-32', 'UTF-8'))).';';
    }
}

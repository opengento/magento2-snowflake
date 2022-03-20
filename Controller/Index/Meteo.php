<?php
/**
 * Copyright © OpenGento, All rights reserved.
 * See LICENSE bundled with this library for license details.
 */
declare(strict_types=1);

namespace Opengento\Snowflake\Controller\Index;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\Controller\Result\JsonFactory;
use Opengento\Snowflake\Service\OpenWeatherMapApi;

class Meteo extends Action
{
    protected OpenWeatherMapApi $api;
    protected JsonFactory $resultJsonFactory;

    public function __construct(
        Context $context,
        OpenWeatherMapApi $api,
        JsonFactory $resultJsonFactory
    ) {
        parent::__construct($context);
        $this->resultJsonFactory = $resultJsonFactory;
        $this->api = $api;
    }

    /**
     * @throws \Cmfcmf\OpenWeatherMap\Exception
     */
    public function execute()
    {
        $lat = $this->getRequest()->getParam('lat');
        $lon = $this->getRequest()->getParam('lon');

        return $this->resultJsonFactory->create()->setData(
            ['is_snowing' => $this->api->isSnowing($lat, $lon)]
        );
    }
}

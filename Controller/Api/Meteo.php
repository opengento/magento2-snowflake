<?php
/**
 * Copyright © OpenGento, All rights reserved.
 * See LICENSE bundled with this library for license details.
 */
declare(strict_types=1);

namespace Opengento\Snowflake\Controller\Api;

use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\App\RequestInterface;
use Magento\Framework\Controller\Result\Json;
use Magento\Framework\Controller\Result\JsonFactory;
use Opengento\Snowflake\Service\OpenWeatherMapApi;

class Meteo implements HttpGetActionInterface
{
    private RequestInterface $request;

    private OpenWeatherMapApi $api;

    private JsonFactory $resultJsonFactory;

    public function __construct(
        RequestInterface $request,
        OpenWeatherMapApi $api,
        JsonFactory $resultJsonFactory
    ) {
        $this->request = $request;
        $this->api = $api;
        $this->resultJsonFactory = $resultJsonFactory;
    }

    // ToDo: Add exception handling + CSRF
    public function execute(): Json
    {
        $isSnowing = ['is_snowing' => '0'];

        $lat = $this->request->getParam('lat') ?? '';
        $lon = $this->request->getParam('lon') ?? '';

        if ($lat && $lon) {
            $isSnowing = ['is_snowing' => $this->api->isSnowing($lat, $lon)];
        }

        return $this->resultJsonFactory->create()->setData($isSnowing);
    }
}

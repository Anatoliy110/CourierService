<?php 

namespace App\Services;

use App\Interfaces\CourierServiceFactoryInterface;
use App\Interfaces\DeliveryServiceInterface;

class DeliveryService implements DeliveryServiceInterface
{
    private $courierFactory;

    public function __construct(CourierServiceFactoryInterface $courierFactory)
    {
        $this->courierFactory = $courierFactory;
    }

    public function send(string $method, array $recipient, array $package): array
    {
        $courierService = $this->courierFactory->create($method);

        try {
            $courierService->sendData($recipient, $package);
        } catch (\Exception $err) {
            return [
                'sended' => false,
                'errorMessage' => $err->getMessage()
            ];
        }

        return [
            'sended' => true,
            'recipient' => $recipient,
            'package' => $package
        ];
    }
}
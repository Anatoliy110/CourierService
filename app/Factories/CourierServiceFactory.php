<?php 

namespace App\Factories;

use App\Interfaces\CourierServiceFactoryInterface;
use App\Interfaces\CourierServiceInterface;
use App\Services\NovaposhtaService;
use App\Services\UkrposhtaService;

final class CourierServiceFactory implements CourierServiceFactoryInterface
{
    public function create(string $method): CourierServiceInterface
    {
        $service = null;
        switch ($method) {
            case UkrposhtaService::getMethod():
                $service = new UkrposhtaService();
                break;
            case NovaposhtaService::getMethod():
            default:
                $service = new NovaposhtaService();
                break;
        }

        return $service;
    }
}
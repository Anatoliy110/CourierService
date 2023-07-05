<?php

namespace App\Providers;

use App\Factories\CourierServiceFactory;
use App\Interfaces\CourierServiceFactoryInterface;
use App\Interfaces\DeliveryServiceInterface;
use App\Services\DeliveryService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(DeliveryServiceInterface::class, DeliveryService::class);
        $this->app->bind(CourierServiceFactoryInterface::class, CourierServiceFactory::class);

    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}

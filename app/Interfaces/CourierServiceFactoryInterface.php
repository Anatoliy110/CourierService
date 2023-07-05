<?php 

namespace App\Interfaces;

interface CourierServiceFactoryInterface
{
    public function create(string $method): CourierServiceInterface;
}
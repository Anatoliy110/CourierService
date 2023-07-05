<?php 

namespace App\Interfaces;

interface DeliveryServiceInterface
{
    public function send(string $method, array $recipient, array $package): array;
}
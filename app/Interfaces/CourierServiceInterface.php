<?php 

namespace App\Interfaces;

use Illuminate\Http\Client\Response;

interface CourierServiceInterface
{
    public static function getMethod(): string;
    public static function getUrl(): string;
    public function sendData(array $recipient, array $package): Response;
}
<?php

namespace App\Services;

use App\Interfaces\CourierServiceInterface;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Http;

class NovaposhtaService implements CourierServiceInterface
{
    private const METHOD = 'novaposhta';
    private const URL = 'http://novaposhta.test/api/delivery';

    public static function getMethod(): string 
    {
        return self::METHOD;
    }

    public static function getUrl(): string 
    {
        return self::URL;
    }

    public function sendData(array $recipient, array $package): Response
    {
        return Http::post(
            self::getUrl(),
            $recipient
        );
    }
    
}
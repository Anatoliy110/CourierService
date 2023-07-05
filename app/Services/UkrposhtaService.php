<?php

namespace App\Services;

use App\Interfaces\CourierServiceInterface;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Http;

class UkrposhtaService implements CourierServiceInterface
{
    private const METHOD = 'ukrposhta';
    private const URL = 'http://google.com';

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
            [
                'recipient' => $recipient,
                'package' => $package
            ]
        );
    }
    
}
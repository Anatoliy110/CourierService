<?php 

namespace App\Http\Controllers;

use App\Interfaces\DeliveryServiceInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class DeliveryController extends Controller
{
    private $deliveryService;

    public function __construct(DeliveryServiceInterface $deliveryService)
    {
        $this->deliveryService = $deliveryService;
    }

    public function sendDeliveryData(Request $request): JsonResponse
    {
        $method = $request->input('method');
        $recipient = $request->input('recipient');
        $package = $request->input('package');
        try {
            $result = $this->deliveryService->send($method, $recipient, $package);
        } catch (\Exception $err) {
            return response()->json(['errorMessage' => $err->getMessage()], JsonResponse::HTTP_INTERNAL_SERVER_ERROR);
        }

        return response()->json($result, isset($result['errorMessage']) ? JsonResponse::HTTP_CONFLICT : JsonResponse::HTTP_OK);
    }
}
<?php

namespace App\Http\Controllers\Travel;

use App\Http\Controllers\Controller;
use App\Http\Resources\GetTravelsResource;
use App\Services\Travel\Contracts\GetTravelServiceContract;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class GetTravelController extends Controller
{
    /**
     * @param GetTravelServiceContract $travelService
     */
    public function __construct(private GetTravelServiceContract $travelService)
    {
        //
    }

    /**
     * @return JsonResponse
     */
    public function __invoke(): JsonResponse
    {
        try {
            $travels = $this->travelService->getTravel();

            return response()->json(GetTravelsResource::collection($travels));
        }catch (Exception $exception) {
            Log::error('Unexpected error', [
                'exception' => $exception,
                'code' => 'get_travels_unexpected_error',
                'controller' => 'get_travel',
            ]);

            return response()->json([
                'message' => 'Unexpected error',
            ], 500);
        }
    }
}

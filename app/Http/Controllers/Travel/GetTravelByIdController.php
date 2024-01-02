<?php

namespace App\Http\Controllers\Travel;

use App\Exceptions\TravelNotFoundException;
use App\Http\Controllers\Controller;
use App\Http\Resources\GetTravelResource;
use App\Services\Travel\Contracts\GetTravelServiceContract;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;

class GetTravelByIdController extends Controller
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
    public function __invoke(int $id): JsonResponse
    {
        try {
            $travel = $this->travelService->getTravelById($id);

            return response()->json(GetTravelResource::make($travel));
        } catch (TravelNotFoundException $exception) {
            Log::error('Travel not found', [
                'exception' => $exception,
                'code' => 'travel_not_found',
                'controller' => 'get_travel_by_id',
            ]);

            return response()->json([
                'message' => 'Travel not found',
            ], 404);
        }
        catch (Exception $exception) {
            Log::error('Unexpected error', [
                'exception' => $exception,
                'code' => 'get_travels_unexpected_error',
                'controller' => 'get_travel_by_id',
            ]);

            return response()->json([
                'message' => 'Unexpected error',
            ], 500);
        }
    }
}

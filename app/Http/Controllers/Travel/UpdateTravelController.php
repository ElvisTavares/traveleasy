<?php

namespace App\Http\Controllers\Travel;

use App\Exceptions\TravelNotFoundException;
use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateTravelRequest;
use App\Services\Travel\Contracts\UpdateTravelServiceContract;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class UpdateTravelController extends Controller
{
    /**
     * @param UpdateTravelServiceContract $updateService
     */
    public function __construct(
        private UpdateTravelServiceContract $updateService,
    ){

    }

    /**
     * @param int $id
     * @param UpdateTravelRequest $request
     * @return JsonResponse
     */
    public function __invoke(int $id, UpdateTravelRequest $request): JsonResponse
    {
        try {
            $requestData = $request->validated();
            $this->updateService->update($id, $requestData);

            return response()->json([
                'message' => 'data edited successfully',
            ], 200);
        } catch (TravelNotFoundException $exception){
            Log::error('Travel not found', [
                'exception' => $exception,
                'code' => 'travel_not_found',
                'controller' => 'update_travel_by_id',
            ]);

            return response()->json([
                'message' => 'Travel not found',
            ], 404);
        } catch (Exception $exception) {
            Log::error('Unexpected error', [
                'exception' => $exception,
                'code' => 'update_travels_unexpected_error',
                'controller' => 'update_travel_by_id',
            ]);

            return response()->json([
                'message' => 'Unexpected error',
            ], 500);
        }
    }
}

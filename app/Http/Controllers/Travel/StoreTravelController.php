<?php

namespace App\Http\Controllers\Travel;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTravelRequest;
use App\Http\Resources\TravelResource;
use App\Services\Travel\Contracts\StoreTravelServiceContract;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;

class StoreTravelController extends Controller
{
    /**
     * @param StoreTravelServiceContract $storeTravelService
     */
    public function __construct(private StoreTravelServiceContract $storeTravelService)
    {
        //
    }

    /**
     * @param StoreTravelRequest $request
     * @return JsonResponse
     */
    public function __invoke(StoreTravelRequest $request): JsonResponse
    {
        try {
            $requestData = $request->validated();
            $travel = $this->storeTravelService->store($requestData);

            return response()->json(TravelResource::make($travel));
        } catch (Exception $exception) {
            Log::error('Unexpected error', [
                'exception' => $exception,
                'code' => 'store_travels_unexpected_error',
                'controller' => 'store_travel',
            ]);

            return response()->json([
                'message' => 'Unexpected error',
            ], 500);
        }
    }
}

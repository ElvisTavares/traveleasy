<?php

namespace App\Http\Controllers\Travel;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTravelRequest;
use App\Http\Resources\TravelResource;
use App\Services\Travel\Contracts\StoreTravelServiceContract;
use Exception;
use Illuminate\Http\JsonResponse;

class StoreTravelController extends Controller
{
    public function __construct(private StoreTravelServiceContract $storeTravelService)
    {
        //
    }

    public function __invoke(StoreTravelRequest $request): JsonResponse
    {
        try {
            $requestData = $request->validated();
            $travel = $this->storeTravelService->store($requestData);

            return response()->json(TravelResource::make($travel));
        } catch (Exception $exception) {
            return response()->json([
                'message' => 'Unexpected error',
            ], 500);
        }
    }
}

<?php

namespace App\Http\Controllers\Travel;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTravelRequest;
use App\Services\Travel\Contracts\StoreTravelServiceContract;
use Illuminate\Http\Request;

class StoreTravelController extends Controller
{
    public function __construct(private StoreTravelServiceContract $storeTravelService)
    {
        //
    }

    public function __invoke(StoreTravelRequest $request)
    {
        try {
            $requestData = $request->validated();
            $this->storeTravelService->store();
        } catch (\Exception $exception) {
//            dd($exception);
        }
    }
}

<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class GetTravelsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'name' => $this->resource->name,
            'departure_date' => $this->resource->departure_date,
            'return_date' => $this->resource->return_date,
            'means_of_transport' => $this->resource->means_of_transport,
            'accommodation' => $this->resource->accommodation,
            'budget' => $this->resource->budget,
            'destinies' => DestiniesResource::collection($this->destinies) ?? null,
        ];
    }
}

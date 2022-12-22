<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->resource->id,
            'attributes' => [
                'name'      => $this->resource->name,
                'description'     => $this->resource->description,
                'deleted_at'     => $this->resource->deleted_at,
                'minimum_amount'     => $this->resource->minimum_amount,
            ],
            'relationships' => [
                'char' => $this->whenLoaded(
                    'char', function () {
                        return ProductCharResource::make($this->resource->char);
                    }
                ),
                'exchange' => $this->whenLoaded(
                    'exchange', function () {
                        return ProductExchangeResource::collection($this->resource->exchange);
                    }
                ),
            ],
        ];
    }
}

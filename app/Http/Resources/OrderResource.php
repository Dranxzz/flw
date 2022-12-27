<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
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
                'name_char'      => $this->resource->name_char,
                'amount'     => $this->resource->amount,
                'status'     => $this->resource->status
            ],
            'relationships' => [
                'product' => $this->whenLoaded(
                    'product', function () {
                        return ProductResource::make($this->resource->product);
                    }
                ),
                'detail' => $this->whenLoaded(
                    'detail', function () {
                        return OrderDetailResource::make($this->resource->detail);
                    }
                ),
            ],
        ];
    }
}




<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductExchangeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->resource->id,
            'attributes' => [
                'amount'      => $this->resource->amount,
            ],
            'relationships' => [
                'coin' => $this->whenLoaded(
                    'coin', function () {
                        return CategoryResource::make($this->resource->coin);
                    }
                ),
                'product' => $this->whenLoaded(
                    'product', function () {
                        return ProductResource::make($this->resource->product);
                    }
                ),
            ],
        ];
    }
}

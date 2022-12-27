<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class OrderDetailResource extends JsonResource
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
                'email'      => $this->resource->email,
            ],
            'relationships' => [
                'coin' => $this->whenLoaded(
                    'coin', function () {
                        return CategoryResource::make($this->resource->coin);
                    }
                ),
            ],
        ];
    }
}




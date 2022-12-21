<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SubCategoryResource extends JsonResource
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
                'deleted_at'     => $this->resource->deleted_at
            ],
            'relationships' => [
                'category' => $this->whenLoaded(
                    'category', function () {
                        return CategoryResource::make($this->resource->category);
                    }
                ),
            ],
        ];
    }
}

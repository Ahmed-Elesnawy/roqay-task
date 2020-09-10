<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CategoryResource extends JsonResource
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
            'name'           => $this->name,
            'slug'           => $this->slug,
            'created'        => $this->created_at,
            'timesince'      => $this->timesince(),
            'show_url'       => $this->showUrl(), 
            'products'       => ProductResource::collection($this->products),
            'products_count' => $this->products->count(),
        ];
    }
}

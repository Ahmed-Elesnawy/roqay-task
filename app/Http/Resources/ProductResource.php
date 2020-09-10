<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
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

            'name'        => $this->name,
            'category'    => $this->category->name,
            'price'       => $this->price,
            'description' => $this->desc, 
            'created'     => $this->created_at,
            'timesince'   => $this->timesince(),
            'show_url'    => $this->showUrl(), 

        ];
    }
}

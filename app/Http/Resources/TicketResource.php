<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TicketResource extends JsonResource
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
            'id'            => $this->id,
            'category_id'   => $this->category->name,
            'name'          => $this->name,
            'type'          => $this->type,
            'price'         => $this->price,
            'stock'         => $this->stock
        ];
    }
}

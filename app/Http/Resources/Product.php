<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Product extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $legsType = [];
        foreach ($this->legs as $item)
        {
            array_push($legsType, $item->leg_name);
        }
        return [
            'id' => $this->id,
            'name' => $this->name,
            'sku' => $this->sku,
            'price' => $this->price,
            'legs_type' => $legsType,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}

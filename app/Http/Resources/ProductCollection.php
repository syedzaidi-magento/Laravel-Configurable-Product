<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class ProductCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
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

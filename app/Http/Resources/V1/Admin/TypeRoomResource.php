<?php

namespace App\Http\Resources\V1\Admin;


use Illuminate\Http\Resources\Json\JsonResource;


class TypeRoomResource extends JsonResource
{

    public function toArray($request): array
    {
        return [
            'id'          => $this->id,
            'title'       => $this->title,
            'price'       => $this->price,
            'amenities'   => $this->amenities,
            'description' => $this->description,
            'bed'         => $this->bed,
            'pictures'    => $this->pictures,
            'extra_person' => $this->extra_person,
            'capacity'     => $this->capacity,
            'thumbnail_picture' => $this->thumbnail_picture,
            'updated_at' => $this->updated_at,
            'created_at' => $this->created_at,
        ];
    }
}

<?php

namespace App\Http\Resources\V1\Admin;


use Illuminate\Http\Resources\Json\ResourceCollection;

class TypeRoomCollection extends ResourceCollection
{

    public function toArray($request): array
    {
        return [
            'data'   => $this->collection->map(function ($item) {
                return [
                    'id'          => $item->id,
                    'title'       => $item->title,
                    'price'       => $item->price,
                    'amenities'   => $item->amenities,
                    'description' => $item->description,
                    'bed'         => $item->bed,
                    'pictures'    => $item->pictures,
                    'extra_person' => $item->extra_person,
                    'capacity'     => $item->capacity,
                    'thumbnail_picture' => $item->thumbnail_picture,
                    'updated_at' => $item->updated_at,
                    'created_at' => $item->created_at,
                ];
            }),
            'status' => 200,
            'flag'   => 'success'
        ];
    }
}

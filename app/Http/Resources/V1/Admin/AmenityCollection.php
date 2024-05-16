<?php

namespace App\Http\Resources\V1\Admin;


use Illuminate\Http\Resources\Json\ResourceCollection;

class AmenityCollection extends ResourceCollection
{

    public function toArray($request): array
    {
        return [
            'data'   => $this->collection->map(function ($item) {
                return [
                    'id'         => $item->id,
                    'title'      => $item->title,
                    'group'      => $item->group,
                    'updated_at' => $item->updated_at,
                    'created_at' => $item->created_at,
                ];
            }),
            'status' => 200,
            'flag'   => 'success'
        ];
    }
}

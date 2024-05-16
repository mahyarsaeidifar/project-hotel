<?php

namespace App\Http\Resources\V1\Admin;


use Illuminate\Http\Resources\Json\JsonResource;


class AmenityResource extends JsonResource
{

    public function toArray($request): array
    {
        return [
            'id'         => $this->id,
            'title'      => $this->title,
            'group'      => $this->group,
            'updated_at' => $this->updated_at,
            'created_at' => $this->created_at,
        ];
    }
}

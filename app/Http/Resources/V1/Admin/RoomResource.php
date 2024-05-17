<?php

namespace App\Http\Resources\V1\Admin;


use Illuminate\Http\Resources\Json\JsonResource;


class RoomResource extends JsonResource
{

    public function toArray($request): array
    {
        return [
            'id'           => $this->id,
            'room_number'  => $this->title,
            'type_room'    => new TypeRoomResource($this->typeRoom),
            'status'     => $this->status,
            'updated_at' => $this->updated_at,
            'created_at' => $this->created_at,
        ];
    }
}

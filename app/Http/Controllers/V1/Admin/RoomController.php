<?php

namespace App\Http\Controllers\V1\Admin;

use App\Models\Room;
use App\Http\Controllers\Controller;
use App\Http\Resources\V1\Admin\RoomResource;
use App\Http\Resources\V1\Admin\RoomCollection;
use App\Http\Requests\V1\Admin\Room\StoreRoomRequest;
use App\Http\Requests\V1\Admin\Room\UpdateRoomRequest;

class RoomController extends Controller
{
    public function index()
    {
        $rooms = Room::query()->filter()->get();

        return new RoomCollection($rooms);
    }

    public function store(StoreRoomRequest $request)
    {
        $data    = $request->validated();

        $room = Room::query()->create($data);

        return new RoomResource($room);

    }

    public function show(Room $room)
    {
        return new RoomResource($room);
    }

    public function update(UpdateRoomRequest $request, Room $room)
    {

        $data = $request->validated();

        $room->update($data);

        return new RoomResource($room);
    }
}

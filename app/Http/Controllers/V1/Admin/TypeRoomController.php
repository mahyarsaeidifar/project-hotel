<?php

namespace App\Http\Controllers\V1\Admin;


use App\Models\TypeRoom;
use App\Http\Controllers\Controller;
use App\Http\Resources\V1\Admin\TypeRoomResource;
use App\Http\Resources\V1\Admin\TypeRoomCollection;
use App\Http\Requests\V1\Admin\TypeRoom\StoreTypeRoomRequest;
use App\Http\Requests\V1\Admin\TypeRoom\UpdateTypeRoomRequest;

class TypeRoomController extends Controller
{
    public function index()
    {
        $type_rooms = TypeRoom::query()->filter()->get();

        return new TypeRoomCollection($type_rooms);
    }

    public function store(StoreTypeRoomRequest $request)
    {
        $data    = $request->validated();
        $pictures = [];

        $thumbnail_picture = uploadImage($request->file('thumbnail_picture'));

        foreach ($request->file('pictures') as $picture){
            $pictures[] = uploadImage($picture);

        }

        $data['thumbnail_picture'] = $thumbnail_picture;
        $data['pictures']          = $pictures;

        $type_room = TypeRoom::query()->create($data);

        return new TypeRoomResource($type_room);

    }

    public function show(TypeRoom $typeRoom)
    {
        return new TypeRoomResource($typeRoom);
    }

    public function update(UpdateTypeRoomRequest $request, TypeRoom $typeRoom)
    {

        $data = $request->validated();

        $pictures = [];
        if ($request->hasFile('thumbnail_picture')) {
            $data['thumbnail_picture'] = uploadImage($request->file('thumbnail_picture'));
        }

        if ($request->hasFile('pictures')){
            foreach ($request->file('pictures') as $picture){
                $pictures[] = uploadImage($picture);
            }
            $data['pictures'] = $pictures;
        }


        $typeRoom->update($data);

        return new TypeRoomResource($typeRoom);
    }

}

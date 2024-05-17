<?php

namespace App\Http\Controllers\V1;

use App\Models\TypeRoom;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\V1\Admin\TypeRoomResource;
use App\Http\Resources\V1\Admin\TypeRoomCollection;

class SearchController extends Controller
{
    public function search(Request $request)
    {

        $result = TypeRoom::query()->where('count', '>=', 1)
            ->filter()->sortWithPaginate('price', 'desc', $request->page);

        return new TypeRoomCollection($result);
    }

    public function details(TypeRoom $typeRoom)
    {
        return new TypeRoomResource($typeRoom);
    }

}

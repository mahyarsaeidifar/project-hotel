<?php

namespace App\Http\Controllers\V1\Admin;

use App\Models\Amenity;
use App\Http\Controllers\Controller;
use App\Http\Resources\V1\Admin\AmenityResource;
use App\Http\Resources\V1\Admin\AmenityCollection;
use App\Http\Requests\V1\Admin\Amenity\StoreAmenityRequest;
use App\Http\Requests\V1\Admin\Amenity\UpdateAmenityRequest;

class AmenityController extends Controller
{
    public function index()
    {
        $amenities = Amenity::query()->get();

        return new AmenityCollection($amenities);
    }

    public function store(StoreAmenityRequest $request)
    {
        $data    = $request->validated();
        $amenity = Amenity::query()->create($data);

        return new AmenityResource($amenity);
    }

    public function show(Amenity $amenity)
    {
        return new AmenityResource($amenity);
    }

    public function update(UpdateAmenityRequest $request, Amenity $amenity)
    {
        $data    = $request->validated();

        $amenity->update($data);

        return new AmenityResource($amenity);
    }

    public function destroy(Amenity $amenity)
    {
        $amenity->delete();

        return response()->noContent();
    }



}

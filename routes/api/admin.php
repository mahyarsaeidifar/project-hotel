<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\V1\Admin\RoomController;
use App\Http\Controllers\V1\Admin\AmenityController;
use App\Http\Controllers\V1\Admin\TypeRoomController;


Route::group(['prefix' => 'v1/admin', 'middleware' => 'auth:sanctum'], function () {

    Route::resource('amenity', AmenityController::class)->except(['edit', 'create']);
    Route::resource('type-room', TypeRoomController::class)->except(['edit', 'create', 'destroy']);
    Route::resource('room', RoomController::class)->except(['edit', 'create']);

});

<?php

namespace App\Models;

use App\Enum\AmenityGroup;
use Illuminate\Database\Eloquent\Model;

class Amenity extends Model
{
    protected $fillable = ['title', 'group'];

    protected $casts = [
        'group' => AmenityGroup::class,
    ];
}

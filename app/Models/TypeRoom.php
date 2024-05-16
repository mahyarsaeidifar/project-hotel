<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeRoom extends Model
{
    protected $fillable = ['title', 'capacity', 'extra_person',
                           'thumbnail_picture', 'pictures', 'bed', 'description', 'amenities', 'price'];
}

<?php

namespace App\Models;

use App\Models\Traits\FilterMe;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TypeRoom extends Model
{

    use FilterMe;
    protected $fillable = ['title', 'capacity', 'extra_person',
                           'thumbnail_picture', 'pictures', 'bed', 'description', 'amenities', 'price'];


    public function rooms():HasMany
    {
        return $this->hasMany(Room::class);
    }


    public function scopeFilter(Builder $query, array $filters = [])
    {
        $filters = $filters ?: request()->all();
        $filters = collect($filters);

        $query->filterColumn($filters, 'id');

        $query->filterStrColumn($filters, 'title');
        $query->filterColumn($filters, 'capacity');

        return $query;
    }
}

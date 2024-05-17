<?php

namespace App\Models;

use App\Models\Traits\FilterMe;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use FilterMe;
    protected $fillable = ['room_number', 'status', 'type_room_id'];

    public function typeRoom():BelongsTo
    {
        return $this->belongsTo(TypeRoom::class, 'type_room_id');
    }

    public function scopeFilter(Builder $query, array $filters = [])
    {
        $filters = $filters ?: request()->all();
        $filters = collect($filters);

        $query->filterColumn($filters, 'id');

        $query->filterStrColumn($filters, 'room_number');
        $query->filterColumn($filters, 'status');
        $query->filterRelColumn($filters, 'typeRoom');

        return $query;
    }
}

<?php

namespace App\Models\Traits;

use Illuminate\Database\Eloquent\Builder;

trait SortColumn
{
    public function scopeSortColumn(Builder $builder, $column = 'created_at', $dir = 'desc'): Builder
    {
        return $builder->orderBy(request('sort_column', $column), request('sort_dir', $dir));
    }

    public function scopeSortWithPaginate(Builder $builder, $column = 'created_at', $dir = 'desc', $perPage = 30)
    {
        return $builder->sortColumn($column, $dir)->paginate(request('per_page', $perPage));
    }
}

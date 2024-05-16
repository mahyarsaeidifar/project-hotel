<?php

namespace App\Models\Traits;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;

trait FilterMe
{
    public function scopeFilterStrColumn(Builder $query, Collection $filters, string $item)
    {
        $filled = $filters->get($item);
        if ($filled !== '' && $filled !== null) {
            $query->where(
                $item,
                'ilike',
                '%'.$filters->get($item).'%'
            );
        }

        return $query;
    }

    public function scopeFilterStrNameColumn(Builder $query, Collection $filters, string $item)
    {
        $filled = $filters->get($item);
        if ($filled !== '' && $filled !== null) {
            $query->where(
                'family',
                'ilike',
                '%'.$filters->get($item).'%'
            )->orWhere(
                'name',
                'ilike',
                '%'.$filters->get($item).'%'
            );
        }

        return $query;
    }

    public function scopeFilterColumn(Builder $query, Collection $filters, string $item, string $operator = '=')
    {
        $filled = $filters->get($item);
        if ($filled !== '' && $filled !== null) {
            $query->where(
                $item,
                $operator,
                $filters->get($item)
            );
        }

        return $query;
    }

    public function scopeFilterBetweenColumn(Builder $query, Collection $filters, string $item)
    {
        $filled = $filters->get($item);
        if ($filled !== '' && $filled !== null) {
            $query->where(
                $item,
                '>=',
                $filters->get($item)
            );
            $query->where(
                $item,
                '<=',
                $filters->get($item)
            );
        }

        return $query;
    }

    public function scopeFilterRelColumn(Builder $query, Collection $filters, string $item)
    {
        $item_filter = $filters->get($item);
        if ($item_filter !== '' && $item_filter !== null) {
            $query->whereHas(Str::camel($item), function ($q) use ($item_filter) {
                $q->filter($item_filter);
            });
        }

        return $query;
    }

    public function scopeFilterFromDateColumn(Builder $query, Collection $filters, string $item, string $col = null)
    {
        $filled = $filters->get($item);
        if ($filled !== '' && $filled !== null) {
            $query->where(
                $item,
                '>=',
                $filters->get($item)
            );
        }

        return $query;
    }

    public function scopeFilterUntilColumn(Builder $query, Collection $filters, string $item, string $col = null)
    {
        $filled = $filters->get($item);
        if ($filled !== '' && $filled !== null) {
            $query->where(
                $item,
                '<=',
                $filters->get($item)
            );
        }

        return $query;

    }
}

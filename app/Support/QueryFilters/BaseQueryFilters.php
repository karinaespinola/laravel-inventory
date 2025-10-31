<?php

namespace App\Support\QueryFilters;



use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

abstract class BaseQueryFilters
{
    public function __construct(protected Request $request) {}

    abstract public function builder(): Builder;

    abstract protected function filters(): array;

    protected function allowedSorts(): array
    {
        return [];
    }

    protected function defaultSort(): ?string
    {
        return null; // e.g. '-id'
    }

    public function apply(?int $perPage = null)
    {
        $q = $this->builder();

        foreach ($this->request->query() as $key => $value) {
            $filters = $this->filters();

            if (! array_key_exists($key, $filters)) {
                continue; // ignore not allowed filters
            }
            $callback = $filters[$key];

            if (is_string($value)) {
                $value = trim($value);
                if ($value === '') continue;
            }
            if (is_array($value) && count($value) === 0) continue;

            $q = $callback($q, $value) ?? $q;
        }

        // Sort: ?sort=field o ?sort=-field
        $sort = $this->request->query('sort', $this->defaultSort());
        if ($sort) {
            $direction = str_starts_with($sort, '-') ? 'desc' : 'asc';
            $column    = ltrim($sort, '-');

            if (in_array($column, $this->allowedSorts(), true)) {
                $q->orderBy($column, $direction);
            }
        }

        if ($perPage) {
            return $q->paginate($perPage)->appends($this->request->query());
        }

        return $q->get();
    }

    protected function like(string $column): \Closure
    {
        return fn (Builder $q, $v) =>
        $q->where($column, 'like', '%'.str_replace('%', '\%', $v).'%');
    }

    protected function exact(string $column): \Closure
    {
        return fn (Builder $q, $v) => $q->where($column, $v);
    }

    protected function boolean(string $column): \Closure
    {
        return fn (Builder $q, $v) =>
        $q->where($column, filter_var($v, FILTER_VALIDATE_BOOL, FILTER_NULL_ON_FAILURE) ?? false);
    }

    protected function dateRange(string $column, string $fromKey, string $toKey): \Closure
    {
        return function (Builder $q, $unused) use ($column, $fromKey, $toKey) {
            $from = $this->request->query($fromKey);
            $to   = $this->request->query($toKey);

            return $q
                ->when($from, fn ($qq) => $qq->whereDate($column, '>=', $from))
                ->when($to,   fn ($qq) => $qq->whereDate($column, '<=', $to));
        };
    }

    protected function whereIn(string $column): \Closure
    {
        return fn (Builder $q, $v) =>
        $q->whereIn($column, is_array($v) ? $v : array_filter(array_map('trim', explode(',', (string)$v))));
    }

    protected function relationExact(string $relation, string $column = 'id', string $paramKey = null): \Closure
    {
        return function (Builder $q, $v) use ($relation, $column) {
            return $q->whereHas($relation, fn ($qq) => $qq->where($column, $v));
        };
    }

    protected function scope(string $scopeMethod): \Closure
    {
        return fn (Builder $q, $v) => $v ? $q->{$scopeMethod}() : $q;
    }
}

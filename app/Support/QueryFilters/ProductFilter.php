<?php

namespace App\Support\QueryFilters;

use App\Models\Product;
use Illuminate\Database\Eloquent\Builder;

class ProductFilter extends BaseQueryFilters
{
    public function builder(): Builder
    {
        return Product::query()->with('category'); // eager por performance
    }

    protected function allowedSorts(): array
    {
        return ['id', 'name', 'price', 'created_at'];
    }

    protected function defaultSort(): ?string
    {
        return 'name';
    }

    protected function filters(): array
    {
        return [
            // /products?name=collar -> LIKE
            'name' => $this->like('name'),

            // /products?is_active=true
            'is_active' => $this->boolean('is_active'),

            // /products?category_id=5
            'category_id' => $this->relationExact('category', 'id'),

            'price_min' => function (Builder $q, $min) {
                $max = request('price_max');
                return $q
                    ->when($min, fn ($qq) => $qq->where('price', '>=', $min))
                    ->when($max, fn ($qq) => $qq->where('price', '<=', $max));
            },

            'price_max' => fn (Builder $q) => $q,

            // /products?ids=1,2,3 o ?ids[]=1&ids[]=2
            'ids' => $this->whereIn('id'),

            // /products?created=1&created_from=2025-01-01&created_to=2025-12-31
            'created' => $this->dateRange('created_at', 'created_from', 'created_to'),
        ];
    }
}

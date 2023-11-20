<?php

namespace App\Filters;

use App\Models\Flower;

class FlowerFilters extends Filters
{
    protected $filters = ['country'];
    /*фильтрация по имени пользователя */
    protected function country($country)
    {
        $fc = Flower::where('country', $country)->firstOrFail();

        return $this->builder->where('id', $fc->id);
    }
}

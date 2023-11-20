<?php

namespace App\Models;

use App\Filters\FlowerFilters;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Flower extends Model
{
    use HasFactory;

    protected $table = 'flower';

    protected $fillable = [
        'name',
        'color',
        'begin_date',
        'end_date',
        'country',
        'price',
        'img',
    ];

    public function imageIsSmaller()
    {
        $image_path = storage_path('app\\public\\' . $this->img);
        $image_size = getimagesize($image_path);

        return $image_size[0] < 400 || $image_size[1] < 400;
    }

    public function prowider()
    {
        return $this->belongsToMany(Provider::class, 'provider_has_flowers', 'flower_id', 'provider_id');
    }

    public function scopeFilter($query, FlowerFilters $filters)
    {
        return $filters->apply($query);
    }

}

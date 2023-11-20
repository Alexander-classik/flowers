<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Provider extends Model
{
    use HasFactory;

    protected $table = 'provider';

    protected $fillable = [
        'name',
        'phone',
    ];

    public function flower()
    {
        return $this->belongsToMany(Flower::class, 'provider_has_flowers', 'provider_id', 'flower_id');
    }

    public function salesman()
    {
        return $this->belongsToMany(Salesman::class, 'salesman_has_providers', 'provider_id', 'salesman_id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Salesman extends Model
{
    use HasFactory;

    protected $table = 'salesman';

    protected $fillable = [
        'name',
        'phone',
        'address',
    ];

    public function provider_s()
    {
        return $this->belongsToMany(Provider::class, 'salesman_has_providers', 'salesman_id', 'provider_id');
    }

}

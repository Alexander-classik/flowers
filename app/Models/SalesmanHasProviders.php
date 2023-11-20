<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalesmanHasProviders extends Model
{
    use HasFactory;

    protected $table = 'salesman_has_providers';

    protected $fillable = [
        'provider_id',
        'salesman_id',
    ];
}

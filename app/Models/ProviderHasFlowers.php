<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class ProviderHasFlowers extends Pivot
{
    use HasFactory;

    protected $table = 'provider_has_flowers';

    protected $fillable = [
        'provider_id',
        'flower_id',
    ];
}

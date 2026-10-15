<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $fillable = [
        'number', 'name', 'description', 'beds',
        'private_toilet', 'price_per_night', 'image',
    ];

    protected function casts(): array
    {
        return [
            'private_toilet' => 'boolean',
            'price_per_night' => 'decimal:2',
        ];
    }
}

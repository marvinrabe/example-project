<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $fillable = [
        'name',
        'is_great',
    ];

    protected function casts(): array
    {
        return [
            'is_great' => 'boolean',
        ];
    }
}

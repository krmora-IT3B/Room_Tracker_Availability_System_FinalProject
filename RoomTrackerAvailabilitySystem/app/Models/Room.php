<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'capacity',
        'equipment',
        'floor',
        'status',
    ];

    protected $casts = [
        'capacity' => 'integer',
    ];
}


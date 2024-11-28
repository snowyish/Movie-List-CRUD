<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Movie extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'genre',
        'year_released',
        'rating',
        'synopsis',
        'language',
        'casts',
        'director',
        'writers',
        'poster',
    ];
}

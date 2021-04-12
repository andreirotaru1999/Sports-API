<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class location_sport extends Model
{
    protected $fillable = [
        'location_id',
        'sport_id',
        'cost',
        'start_date',
        'end_date'
    ];

    protected $table = 'location_sport';

    use HasFactory;
}

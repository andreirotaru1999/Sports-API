<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sport extends Model
{
    protected $fillable = [
        'name',
        'start_date',
        'end_date',
        'cost'
    ];

    protected $table = 'sports';
}

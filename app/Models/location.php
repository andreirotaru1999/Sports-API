<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class location extends Model
{
    protected $fillable = [
        'name',
        'id_parinte',
        'LocationType',
        'cost'
    ];

    protected $table = 'locations';
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sport extends Model
{
    protected $fillable = [
        'name'
    ];

    protected $table = 'sports';

    public function locations()
    {
        return $this->belongsToMany(location::class)
        ->withTimestamps()
        ->withPivot('start_date')
        ->withPivot('end_date')
        ->withPivot('cost');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LocationType extends Model
{
    protected $fillable = [
        'name'
    ];
    protected $table = 'location_types';

    public function type()
    {
        return $this->hasMany(location::class);
        
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LocationType extends Model
{
    protected $fillable = [
        'name',
        'cost'
    ];
    protected $table = 'location_types';

    public function type()
    {
        return $this->hasMany(location::class);
        //return $this->hasMany(App/Models/location);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class location extends Model
{
    protected $fillable = [
        'name',
        'id_parinte',
        'location_types_id'
    ];

    protected $table = 'locations';

    public function gettype()
{
    return $this->belongsTo(Post::LocationType, 'flocation_types_id', 'id');
}
    
}

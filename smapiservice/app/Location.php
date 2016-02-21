<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    
    protected $table = 'location_dimension';
    protected $primaryKey = 'geoid';
    
    // public function fact()
    // {
    //     return $this->belongsTo('App\Fact', 'geoid', 'geoid');
    // }
}

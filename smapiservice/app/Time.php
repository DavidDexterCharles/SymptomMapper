<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Time extends Model
{
    
    protected $table = 'time_dimension';
    protected $primaryKey = 'time_id';
    
    // public function fact()
    // {
    //     return $this->belongsTo('App\Fact', 'time_id', 'time_id');
    // }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    
    protected $table = 'person_dimension';
    protected $primaryKey = 'personid';
    
    // public function fact()
    // {
    //     return $this->belongsTo('App\Fact', 'personid', 'personid');
    // }
}

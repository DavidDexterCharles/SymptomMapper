<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Symptom extends Model
{
    
    protected $table = 'symptoms_dimension';
    protected $primaryKey = 'symptom_id';
    
    // public function fact()
    // {
    //     return $this->belongsTo('App\Fact', 'symptom_id', 'symptomid');
    // }
}

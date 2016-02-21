<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fact extends Model
{
    
    protected $table = 'symptoms_record_fact';
    protected $primaryKey = 'srf_id';
    
    public function times()
    {
        return $this->hasMany('App\Time','time_id','time_id');
    }
    
    public function symptoms()
    {
        return $this->hasMany('App\Symptom','symptom_id','symptomid');
    }
    
    public function locations()
    {
        return $this->hasMany('App\Location','geoid','geoid');
    }
    
    public function persons()
    {
        return $this->hasMany('App\Person','personid','personid');
    }
    
}

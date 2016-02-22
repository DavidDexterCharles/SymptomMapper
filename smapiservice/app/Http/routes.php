<?php

header('Access-Control-Allow-Origin: *');//http://stackoverflow.com/questions/20035101/no-access-control-allow-origin-header-is-present-on-the-requested-resource
header('Access-Control-Allow-Methods: GET, POST, OPTIONS');//http://stackoverflow.com/questions/13400594/understanding-xmlhttprequest-over-cors-responsetext?lq=1

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


Route::get('persons', function () {
    $person= App\Person::all();
    return $person;
});

Route::get('persons/{id}', function ($id) {
    return App\Person::find($id);
});

Route::get('locations',function(){
    return App\Location::all();
});

Route::get('locations/{id}', function ($id) {
    return App\Location::find($id);
});

Route::get('times',function(){
    return App\Time::all();
});

Route::get('times/{id}', function ($id) {
    return App\Time::find($id);
});

Route::get('symptoms',function(){
    return App\Symptom::all();
});

Route::get('symptoms/{id}', function ($id) {
    return App\Location::find($id);
});

Route::get('facts',function(){
    $facts = App\Fact::all();
    
    
    foreach ($facts as $fact) {
        foreach($fact->persons as $person){
            
        }
        foreach($fact->locations as $location){
            
        }
        foreach($fact->times as $time){
            
        }
        
        foreach($fact->symptoms as $symptom){
            
        }
        
    }
    return $facts;
});

Route::get('facts/{id}',function($id){
    $fact = App\Fact::find($id);
    
    foreach($fact->persons as $person){
            
    }
    foreach($fact->locations as $location){
        
    }
    foreach($fact->times as $time){
        
    }
    
    foreach($fact->symptoms as $symptom){
        
    }
    return $fact;
});

///quizzes/filter/:type/:level/:difficulty

Route::get('facts/filter/{begin_time}/{end_time}/{longi}/{lati}/{symptom}',function($begin_time,$end_time,$longi,$lati,$symptom){
    //time timestamps
    //location lat,long
    //symptom name pain
    
    
    
    
    
    $facts = App\Fact::all();
    
    foreach ($facts as $fact) {
        foreach($fact->persons as $person){
            
        }
        foreach($fact->locations as $location){
            
        }
        foreach($fact->times as $time){
            
        }
        
        foreach($fact->symptoms as $symptom){
            
        }
        
    }
    return $facts;
});

Route::get('/', function () {
    // return view('welcome');
    // $laravel = app();
    // echo $version = $laravel::VERSION;
    echo 'Welcome to my site';
});


Route::get('facts/filter/{begin_time}/{end_time}/{longi}/{lati}/{symptom}',function($begin_time,$end_time,$longi,$lati,$symptom){
    //time timestamps
    //location lat,long
    //symptom name pain
    //AIzaSyBGZR6aqWdZt5MW_F9K4FrK-pz-bmGmzq4

    $result = array();
    $symptom_query = null; 
    if($symptom == '*'){
    	$symptom_query = DB::Table('symptoms_dimension')->get();  
    }else{
    	$symptom_query = DB::Table('symptoms_dimension')->where('symptom','like','%'.$symptom.'%')->get();
    }

    $symptom_ids = array();

    foreach($symptom_query as $symptom){
    	array_push($symptom_ids,$symptom->symptom_id);
    }
    //return $symptom_ids;

    if($begin_time == '*' && $end_time == '*'){
    	$time_query = DB::Table('time_dimension')->get();
    }else if($begin_time == '*' && $end_time != '*'){
    	$time_query = DB::Table('time_dimension')->where('time_stamp','<=',$end_time)->get();
    }else if($begin_time != '*' && $end_time == '*'){
    	$time_query = DB::Table('time_dimension')->where('time_stamp','>=',$begin_time)->get();
    }else if($begin_time != '*' && $end_time != '*'){
    	$time_query = DB::Table('time_dimension')->whereBetween('time_stamp',[$begin_time,$end_time])->get();
    }
     
    $time_ids = array();

    foreach($time_query as $time){
    	array_push($time_ids,$time->time_id);
    }
    
    $geo_ids = array();
    $geo_query = null;
    
    if($longi=='*' || $lati=='*'){
        $geo_query = App\Location::all();
    }else
    
    //return $time_ids;
    
    $facts = App\Fact::all()->whereIn('symptomid', $symptom_ids)->whereIn('time_id',$time_ids)->whereIn('geoid',$geo_ids);
    
    foreach ($facts as $fact) {
        foreach($fact->persons as $person){
            
        }
        foreach($fact->locations as $location){
            
        }
        foreach($fact->times as $time){
            
        }
        
        foreach($fact->symptoms as $symptom){
            
        }
        
    }
    return $facts;
});

function toRad($num){
    return $num * pi() / 180;
}

function getDistanceFromCoords($lona,$lata,$lonb,$latb){
    //$radians = 
    
    $R = 6371; // km
    $dLat = toRad($latb-$lata);
    $dLon = toRad($lonb-$lona);
    $lata =toRad($lata);
    $latb = toRad($latb);
    
    $a = sin($dLat/2) * sin($dLat/2) +
            sin($dLon/2) * sin($dLon/2) * cos($lata) * cos($latb); 
    $c = 2 * atan2(sqrt($a),sqrt(1-$a)); 
    return $R * $c;

}

Route::get('test',function(){
    
    return getDistanceFromCoords(0,0,0,0);
});



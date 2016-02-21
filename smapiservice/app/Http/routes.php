<?php

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













Route::get('/', function () {
    // return view('welcome');
    // $laravel = app();
    // echo $version = $laravel::VERSION;
    echo 'Welcome to my site';
});

// Route::get('hello/{name}', function ($name) {
    
//     echo 'Hello there '.$name;
// });

//  Route::post('/test',function(){
//      echo 'POST';
//  });// create an item
 
// Route::get('/test',function(){
//      echo 'GET';
//      echo '<form method="POST" action"test">';
//      echo '<input type="submit">';
//      echo '<input type="hidden" value="PUT" name="_method">';
//      echo '</form>';
//  });//read an item
//  Route::get('/test2',function(){
//      echo '<form method="POST" action"test">';
//      echo '<input type="submit">';
//      echo '<input type="hidden" value="DELETE" name="_method">';
//      echo '</form>';
//  });//read an item
 
// Route::put('/test',function(){
//      echo 'UPDATE';
//  });//update an item
// Route::delete('/test2',function(){
//      echo 'delete';
//  });//delete an item

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

// Route::group(['middleware' => ['web']], function () {
//     //
// });

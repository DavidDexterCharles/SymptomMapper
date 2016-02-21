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


Route::get('person', function () {
    $person=App\person_dimension::all();
    echo'<prev>';
    vardump($person);
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

// /*
// |--------------------------------------------------------------------------
// | Application Routes
// |--------------------------------------------------------------------------
// |
// | This route group applies the "web" middleware group to every route
// | it contains. The "web" middleware group is defined in your HTTP
// | kernel and includes session state, CSRF protection, and more.
// |
// */

// Route::group(['middleware' => ['web']], function () {
//     //
// });

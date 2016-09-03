<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/',['uses'=>'HomeController@index','as'=>'home']);
Route::get('/register/{token}/continue',['uses'=>'HomeController@continueRegistration','as'=>'continue_registration']);
Route::post('/send-student-confirmation',['uses'=>'HomeController@sendStudentConfirmation','as'=>'send_student_confirmation']);

<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:api');

Route::get('/get-skills-by-id',['uses'=>'HomeController@getSkillsFromId','as'=>'api_get_skills_by_id']);
Route::get('/get_fields','HomeController@getFieldJson');

Route::get('/get-internships-list','APIController@getInternshipListJson');
Route::get('/get-states','APIController@getStates');

Route::group(['prefix'=>'admin'], function(){
  Route::get('/companies','APIController@getCompanies');
  Route::get('/users','APIController@getUsers');
  Route::resource('/internships','Admin\InternshipAPIController');
  Route::resource('/qualification-type','Admin\QualificationTypeController');
  Route::resource('/people','Admin\UserController');
  Route::resource('/college','Admin\CollegeController');



  /* POST ROUTES */
  Route::post('/save_skills_by_id','Admin\AdminFormController@saveSkillsByField');
  Route::post('/delete_skill_by_id','Admin\AdminFormController@deleteSkillById');
});

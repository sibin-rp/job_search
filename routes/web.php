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
Route::get('/about',['uses'=>'HomeController@about','as'=>'about_us']);
Route::get('/faq',['uses'=>'HomeController@faq','as'=>'faq']);
Route::get('/error',['uses'=>'HomeController@error','as'=>'error']);
Route::get('/thanks',['uses'=>'HomeController@showThanksPage','as'=>'thanks_page']);
Route::get('/login',['uses'=>'HomeController@showLoginPage','as'=>'login_page']);
Route::post('/after-login',['uses'=>'HomeController@postLoginPage','as'=>'post_login']);
Route::get('/logout-page',['uses'=>'LoginController@logout','as'=>'logout_page']);


Route::get('sample_page','HomeController@samplePage');

Route::get('/admin_login',['uses'=>'LoginController@admin_login','as'=>'admin_login']);
Route::get('/complete-confirmation',['uses'=>'HomeController@completeConfirmation','as'=>'complete_confirmation']);
Route::post('/login_admin',['uses'=>'LoginController@login_admin','as'=>'login_admin']);
Route::get('/admin_logout',['uses'=>'LoginController@admin_logout','as'=>'admin_logout']);
Route::get('/register/{token}/continue',['uses'=>'HomeController@continueRegistration','as'=>'continue_registration']);
Route::post('/send-student-confirmation',['uses'=>'HomeController@sendStudentConfirmation','as'=>'send_student_confirmation']);
/* Save Students Form */
Route::post('/student/save-personal-form',['uses'=>'HomeController@saveStudentPersonalData','as'=>'save_student_personal_data']);
Route::post('/student/save-internship-form',['uses'=>'HomeController@saveStudentInternshipPreferenceData','as'=>'save_student_internship_data']);
Route::post('/student/save-qualification-form',['uses'=>'HomeController@saveStudentQualificationData','as'=>"save_student_qualification"]);
Route::post('/student/save-experience-form',['uses'=>'HomeController@saveStudentExperienceData','as'=>'save_student_experience_data']);
/* eof student form */

/* Save Company Form */
Route::post('/save-company-info',['uses'=>'HomeController@saveCompanyInfo','as'=>'save_company_info']);
Route::post('/company-logo-upload',['uses'=>'HomeController@companyLogoUpload','as'=>'company_logo_upload']);
Route::get('/company-internship-form',['uses'=>'HomeController@companyInternshipForm','as'=>'company_internship_form']);
Route::post('/save-company-internship-form',['uses'=>'HomeController@saveCompanyInternshipForm','as'=>'save_company_internship_form']);
/* eof company form */

Route::match(['GET','POST'],"/list-internship",['uses'=>'HomeController@listInternship','as'=>'internship_list']);
Route::get('/show-internship/{id}',['uses'=>'HomeController@showInternship','as'=>'show_internship']);



Route::post('upload-image',['uses'=>'HomeController@sample_photo_upload','as'=>'upload_image']);
/**
 * ====================================
 * ADMIN ROUTES
 * ====================================
 */
Route::group(['prefix' => 'admin','middleware' => 'admin','namespace'=>'Admin'], function (){
  Route::get('/dashboard',['uses'=>'AdminHomeController@index','as'=>'admin.index']);
});
/** =================================== */


/**
 * ====================================
 * USER ROUTES
 * ====================================
 */

Route::group(['prefix'=>'user','namespace'=>'User','middleware'=>['auth','student']], function(){
  Route::resource('user','UserController',['except'=>['create','index','store']]);
  Route::post('{user}/profile/upload',['uses'=>'UserController@user_profile_upload','as'=>'user.profile.upload']);
  Route::resource('{user}/experience','ExperienceController');
  Route::resource('{user}/qualification','QualificationController');
  Route::resource('{user}/preference','InternshipPreferenceController');

});

/**===================================*/

/**
 * ======================================
 * COMPANY ROUTES
 * ======================================
 */

Route::group(['prefix'=>'company','namespace'=>'Company','middleware'=>['auth','company']], function(){
  Route::resource('company_user','UserController',[
    'except'=>['index','create','store']
  ]);
  Route::post('profile/upload',['uses'=>'CompanyController@logo_upload','as'=>'company.logo.upload']);
  Route::resource('company','CompanyController',['except'=>['create','index','store']]);
  Route::resource('{company}/internships_program','InternshipProgramController');
});


/**======================================*/


Route::post('/deep_crawl','HomeController@deepCrawl');
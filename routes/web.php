<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/login', function () {
    return view('auth/login');
});

Route::get('/register', function () {
    return view('auth/register');
});

Route::group(['middleware' => ['jwt.auth']], function() {

	Route::resource('professors', 'ProfessorsController');
	Route::resource('rooms', 'RoomsController');
	Route::resource('schedules', 'SchedulesController');
	Route::resource('sections', 'SectionsController');
	Route::resource('specializations', 'SpecializationsController');
	Route::resource('students', 'StudentsController');
	Route::resource('subjects', 'SubjectsController');
	Route::resource('slots', 'TimesController');
	
});


Route::post('/auth/login', 'AuthController@login');
Route::post('/auth/logout', 'AuthController@logout');

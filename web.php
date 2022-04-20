<?php

use Illuminate\support\Facades\Route;
use Illuminate\Support\Facades\DB;

use  App\Http\Controllers\RegController;
use App\Http\Middleware\CheckPage;

use App\Info;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dash', function () {
    return view('dashboard');
});

Route::get('/newreg','NewRegistrationController@getReg');
Route::post('/newreg','NewRegistrationController@reg');

Route::get('/newlogin','NewLoginController@getLogin');
Route::post('/newlogin','NewLoginController@postLogin');

Route::get('/newadminreg','NewRegistrationController@getAdminReg');
Route::post('/newadminreg','NewRegistrationController@postAdminReg');

Route::get('/newadminlogin','NewLoginController@getAdminLogin');
Route::post('/newadminlogin','NewLoginController@postAdminLogin');

Route::get('/logout','LoginController@logoutin'); 
Route::post('/logout','LoginController@logout'); 

Route::get('/adduser','FeaturesController@addUser')->middleware('session');
Route::post('/adduser','FeaturesController@addUserPost')->middleware('session');

//DELETE
Route::get('show','FeaturesController@showData')->middleware('session');
Route::get('/show/{id}','FeaturesController@destroy')->middleware('session');

Route::get('user', function () {
    return view('userDetails');
})->middleware('session');

//EMPLOYEE DEATILS
Route::get('/employee_details/{id}','EmployeeController@getDetails')->middleware('session');
Route::post('/employee_details/{id}','EmployeeController@postEmployeeDetails')->middleware('session');

//TO SHOW TEAM DETAILS TO MANAGER ONLY
Route::get('/team_details/{team}','EmployeeController@myTeam')->middleware('session');

Route::get('team','EmployeeController@view')->middleware('session');

//EDIT
Route::get('/editrecords','EmployeeController@index')->middleware('session');
Route::get('edit/{email}','EmployeeController@show')->middleware('session');
Route::post('edit/{email}','EmployeeController@edit')->middleware('session');

Route::get('/calendar/{email}','AttendanceController@getView')->middleware('session');
Route::get('final/{id}','AttendanceController@getAtt')->middleware('session');
Route::post('final/{id}','AttendanceController@finalSubmit')->middleware('session');

Route::get('/approval','AttendanceController@getApprovals')->middleware('session');
Route::get('/approve_attendance/{email}','AttendanceController@finalApprove')->middleware('session');
Route::post('/approve_attendance/{email}','AttendanceController@postApproveAttendance')->middleware('session');

//Employee Profile 
Route::get('/profile/{id}','EmployeeController@viewProfile')->middleware('session');

//PAYROLL
Route::get('/payroll_details/{email}','PayrollController@getDetails')->middleware('session');

//Attendance Portal
Route::get('attendance/{email}','AttendanceController@index')->middleware('session');
Route::post('attendance/{id}','AttendanceController@postIndex')->middleware('session');
Route::get('att','AttendanceController@getAttendance')->middleware('session');

Route::get('pv','FeaturesController@getPaginateView')->middleware('session');

//View and edit your own profile
Route::get('/ownprofile/{email}','FeaturesController@viewProfile')->middleware('session');
Route::get('/ownprofile/own/{email}','FeaturesController@updateOwnProfile')->middleware('session');
Route::post('/ownprofile/own/{email}','FeaturesController@postupdateOwnProfile')->middleware('session');






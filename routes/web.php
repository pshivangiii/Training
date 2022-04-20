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

Route::group(['middleware'=>'session'],function(){
    Route::get('/payroll_details/{email}','PayrollController@getDetails');

    Route::get('/adduser','FeaturesController@addUser');
    Route::post('/adduser','FeaturesController@addUserPost');

    Route::get('show','FeaturesController@showData');
    Route::get('/show/{id}','FeaturesController@destroy');

    Route::get('user', function () {
            return view('userDetails');
        });

    Route::get('/employee_details/{id}','EmployeeController@getDetails');
    Route::post('/employee_details/{id}','EmployeeController@postEmployeeDetails');
    
    Route::get('/team_details/{team}','EmployeeController@myTeam');

    Route::get('team','EmployeeController@view');

    Route::get('/editrecords','EmployeeController@index');
    Route::get('edit/{email}','EmployeeController@show');
    Route::post('edit/{email}','EmployeeController@edit');

    Route::get('/profile/{id}','EmployeeController@viewProfile');

    Route::get('/calendar/{email}','AttendanceController@getView');
    Route::get('final/{id}','AttendanceController@getAtt');
    Route::post('final/{id}','AttendanceController@finalSubmit');


    Route::get('/approval','AttendanceController@getApprovals');
    Route::get('/approve_attendance/{email}','AttendanceController@finalApprove');
    Route::post('/approve_attendance/{email}','AttendanceController@postApproveAttendance');

    Route::get('attendance/{email}','AttendanceController@index');
    Route::post('attendance/{id}','AttendanceController@postIndex');
    Route::get('att','AttendanceController@getAttendance');

    Route::get('pv','FeaturesController@getPaginateView');

    Route::get('/ownprofile/{email}','FeaturesController@viewProfile');
    Route::get('/ownprofile/own/{email}','FeaturesController@updateOwnProfile');
    Route::post('/ownprofile/own/{email}','FeaturesController@postupdateOwnProfile');

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








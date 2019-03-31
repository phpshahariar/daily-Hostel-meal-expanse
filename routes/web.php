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


use App\User;

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware', ['web','auth']], function (){
    Route::get('/', function () {
        return view('auth.login');
    });
    Route::get('/home', function (){
        if (Auth::user()->admin == 0){
            return view('users.borders-dashboard');
        }else{
            $users['users']= App\User::all();
            return view('admin.admin-dashboard');
        }
    });

});

Route::get('/home', 'BorderController@index');
Route::post('/add-data', 'BorderController@add_meal');
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
Route::get('/', function () {
    return view('auth.login');
});

Route::get('/admin', function () {
    return view('admin.admin-login');
});



Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');

//Route::group(['middleware', ['web','auth']], function (){
//
//    Route::get('/home', function (){
//        if (Auth::user()->admin == 0){
//            return view('users.borders-dashboard');
//        }else{
//
//            return view('admin.admin-dashboard');
//        }
//    });
//
//});


Route::post('/admin-login', 'AdminController@login_dashboard');
Route::get('/admin-dashboard', 'AdminController@admin_dashboard');

Route::get('/border-deposit', 'DepositController@border_deposit');
Route::get('/get/deposit/data', 'DepositController@get_deposit');
Route::post('/add/deposit/data', 'DepositController@add_deposit');

Route::get('/view/border/data', 'DepositController@view_deposit');
Route::get('/delete/border/data', 'DepositController@delete_deposit_data');
Route::get('/edit/border/data', 'DepositController@edit_deposit_data');
Route::post('/update/deposit/data', 'DepositController@update_deposit_data');
Route::get('/get/deposit/data/pagination', 'DepositController@pagination_deposit_data');



Route::get('/daily/expanse', 'ExpanceController@daily_expance_data');
Route::post('/add/expanse/data', 'ExpanceController@save_expance_data');
Route::get('/get/expanse/data', 'ExpanceController@get_expance_data');


Route::get('/home', 'BorderController@index');
Route::post('/add-data', 'BorderController@add_meal');

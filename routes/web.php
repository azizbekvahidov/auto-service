<?php

use App\Http\Controllers\CarController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ClientController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
Auth::routes();


Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'App\Http\Controllers\UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\ProfileController@update']);
	Route::get('upgrade', function () {return view('pages.upgrade');})->name('upgrade');
	 Route::get('map', function () {return view('pages.maps');})->name('map');
	 Route::get('icons', function () {return view('pages.icons');})->name('icons');
	 Route::get('table-list', function () {return view('pages.tables');})->name('table');
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\ProfileController@password']);


    Route::group([
        "prefix" => "service",
        "as" => "service."
    ], function(){
    Route::get("",[ServiceController::class,"index"])->name('index');
	Route::get("create",[ServiceController::class,"create"])->name("create");
	Route::put("store",[ServiceController::class,"store"])->name("store");
	Route::get("edit/{id}" ,[ServiceController::class,"edit"])->name("edit");
	Route::put("update/{id}" ,[ServiceController::class,"update"])->name("update");
	Route::get("delete/{id}" ,[ServiceController::class,"destroy"])->name("delete");
    });

	Route::group([
        "prefix" => "client",
        "as" => "client."
    ], function(){
    Route::get("",[ClientController::class,"index"])->name('index');
    Route::get("create",[ClientController::class,"create"])->name('create');
    Route::put("store",[ClientController::class,"store"])->name('store');
    Route::get("edit/{id}",[ClientController::class,"edit"])->name('edit');
    Route::put("update/{id}" ,[ClientController::class,"update"])->name("update");
    Route::get("delete/{id}" ,[ClientController::class,"destroy"])->name("delete");
    });

    Route::group([
        "prefix" => "car",
        "as" => "car."
    ], function(){
    Route::get("",[CarController::class,"index"])->name('index');
    Route::get("create",[CarController::class,"create"])->name('create');
    Route::put("store",[CarController::class,"store"])->name('store');
    Route::get("edit/{id}",[CarController::class,"edit"])->name('edit');
    Route::put("update/{id}" ,[CarController::class,"update"])->name("update");
    Route::get("delete/{id}" ,[CarController::class,"destroy"])->name("delete");
    });

});


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


<?php

use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::get('cars/{id}', [ApiController::class, 'cars']);
Route::get('services/{id}', [ApiController::class, 'service']);
Route::get('services', [ApiController::class, 'show_service']);

Route::get('report/{id}', [ApiController::class, 'report']);
Route::get('bargain_service/{id}', [ApiController::class, 'bargain_service']);



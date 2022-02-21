<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\VisitorController; 
use App\Http\Controllers\ServiceController; 
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

Route::get('/', [HomeController::class, 'HomeIndex']);
Route::get('/visitor', [VisitorController::class, 'VisitorIndex']);
Route::get('/service', [ServiceController::class, 'ServiceIndex']);
Route::get('/getservicedata', [ServiceController::class, 'getServiceData']);
Route::post('/serviceDelete', [ServiceController::class, 'serviceDelete']); 
Route::post('/serviceEdit', [ServiceController::class, 'serviceEdit']);
Route::post('/serviceUpdate', [ServiceController::class, 'serviceUpdate']); 
Route::post('/serviceAdd', [ServiceController::class, 'serviceAdd']); 
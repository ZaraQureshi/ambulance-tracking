<?php

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
use App\Http\Controllers\HospitalController;
use App\Http\Controllers\DriverController;
Route::get('/', function () {
    return view('auth/login');
});
Route::get('hospital_show',[HospitalController::class,'show']);
Route::get('hospital_create',[HospitalController::class,'create']);
Route::post('hospital_submit',[HospitalController::class,'store']);
Route::get('hosp_edit/{id}',[HospitalController::class,'edit']);
Route::post('hospital_update/{id}',[HospitalController::class,'update'])->name('hospital.update');
Route::get('hospital_delete/{id}',[HospitalController::class,'destroy']);
//driver
Route::get('driver_show',[DriverController::class,'show']);
Route::get('driver_create',[DriverController::class,'create']);
Route::post('driver_submit',[DriverController::class,'store']);
Route::get('driver_edit/{id}',[DriverController::class,'edit']);
Route::post('driver_update/{id}',[DriverController::class,'update'])->name('driver.update');
Route::get('driver_delete/{id}',[DriverController::class,'destroy']);

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

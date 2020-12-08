<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DccController;
use App\Http\Controllers\LccController;
use App\Http\Controllers\LeaveController;
use App\Http\Controllers\RegionController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\Auth\RegisterController;

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

Route::resource('/employees',EmployeeController::class);
Route::resource('/leaves', LeaveController::class);
Route::resource('/regions', RegionController::class);
Route::resource('/regions-dccs', DccController::class);
Route::resource('/regions-lccs', LccController::class);


Auth::routes();
Route::middleware(['auth'])->group(function () {
    Route::get('/', function () {
        return view('dashboard');
    })->name('dashboard');

//    Route::get('/employees',[EmployeeController::class, 'index'])->name('employees');

   
});


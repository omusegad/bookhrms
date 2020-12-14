<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DccController;
use App\Http\Controllers\LccController;
use App\Http\Controllers\NhifController;
use App\Http\Controllers\NssfController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LeaveController;
use App\Http\Controllers\RegionController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\JobgroupController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LeaveTypesController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\LeaveSettingsController;

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




Auth::routes();
Route::middleware(['auth'])->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/admin', [AdminController::class, 'index']);
    Route::resource('/employees',EmployeeController::class);
    Route::resource('/leaves', LeaveController::class);
    Route::resource('/leave-types', LeaveTypesController::class);
    Route::resource('/leave-settings', LeaveSettingsController::class);
    Route::resource('/regions', RegionController::class);
    Route::resource('/dccs-regions', DccController::class);
    Route::resource('/lccs-regions', LccController::class);
    Route::resource('/job-groups', JobgroupController::class);
    Route::resource('/nssf-details', NssfController::class);
    Route::resource('/nhif-details', NhifController::class);
   // all routes 
   
});


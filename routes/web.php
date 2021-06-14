<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DccController;
use App\Http\Controllers\LccController;
use App\Http\Controllers\SmsController;
use App\Http\Controllers\NhifController;
use App\Http\Controllers\NssfController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LeaveController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\RegionController;
use App\Http\Controllers\SalaryController;
use App\Http\Controllers\HqLeaveController;
use App\Http\Controllers\PayrollController;
use App\Http\Controllers\PayslipController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\HolidaysController;
use App\Http\Controllers\HqSalaryController;
use App\Http\Controllers\JobgroupController;
use App\Http\Controllers\MyLeavesController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MyPayrollController;
use App\Http\Controllers\FieldLeaveController;
use App\Http\Controllers\HqEmployeeController;
use App\Http\Controllers\LeaveTypesController;
use App\Http\Controllers\OrganogramController;
use App\Http\Controllers\FieldSalaryController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\FieldEmployeeController;
use App\Http\Controllers\LeaveSettingsController;
use App\Http\Controllers\EmployeeSalaryController;
use App\Http\Controllers\SalarySettingsController;
use App\Http\Controllers\EmployeeProfileController;

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

//Route::resource('/employees',EmployeeController::class);

Auth::routes();
Route::middleware(['auth'])->group(function () {
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
        Route::get('/admin', [AdminController::class, 'index']);
        Route::get('/organogram', [OrganogramController::class, 'index']);
        Route::resource('roles', RolesController::class)->only(['index','store']);
        Route::resource('/employees',EmployeeController::class);
        Route::get('/field-employees',[FieldEmployeeController::class, 'index']);
        Route::get('/hq-employees',[HqEmployeeController::class, 'index']);
        Route::get('/field-employees',[FieldEmployeeController::class, 'index']);
        Route::get('/hq-employees',[HqEmployeeController::class, 'index']);
        Route::resource('/employees-profile',ProfileController::class)->only('update');
        Route::resource('/leaves', LeaveController::class);
        Route::resource('/leave-types', LeaveTypesController::class);
        Route::resource('/leave-settings', LeaveSettingsController::class);
        Route::resource('/regions', RegionController::class);
        Route::resource('/dccs-regions', DccController::class);
        Route::resource('/lccs-regions', LccController::class);
        Route::resource('/job-groups', JobgroupController::class);
        Route::resource('/salaries', SalaryController::class);


        Route::resource('/field-salaries',FieldSalaryController::class)->only(['index','store']);
        Route::resource('/hq-salaries',HqSalaryController::class)->only(['index','store']);

        Route::get('/salaries-export-excel', [SalaryController::class, 'exportexcel']);
        Route::get('/hq-salaries-export-excel', [HqSalaryController::class, 'exportexcel']);
        Route::get('/field-salaries-export-excel', [FieldSalaryController::class, 'exportexcel']);

        Route::resource('/salary-settings', SalarySettingsController::class);
        Route::resource('/holidays', HolidaysController::class);
        Route::resource('/payroll', PayrollController::class)->only(['index','store']);
        Route::post('payroll/process-all', [PayrollController::class, 'processall']);

        Route::resource('/payslip', PayslipController::class);
        Route::resource('/hq-leaves',HqLeaveController::class)->only(['index']);
        Route::resource('/field-leaves',FieldLeaveController::class)->only(['index']);

        //sms
        Route::resource('/sms', SmsController::class)->only(['index','create','store','upload']);
        Route::get('/download-contacts', [SmsController::class, 'download']);




        Route::resource('/my-payroll',MyPayrollController::class)->only(['index']);
        Route::resource('/my-leaves',MyLeavesController::class)->only(['index']);
    // Employee Dashbaord Routes










});


<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Salary;
use App\Models\Payroll;
use App\Models\Jobgroup;
use Illuminate\Http\Request;

class HqSalaryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){

        $employees = User::all();
        $userpayroll   = User::where('employee_type','HQ')->with("payroll")->get();
       // dd( $payroll);

        $jobgroup  = Jobgroup::all();
        $salaries  = Salary::with('users')->get();
        $totalBasicSalary  = Salary::sum('basic_salary');
        $totalHseAllowance  = Salary::sum('hse_allowance');
        $totalTransportAllowance  = Salary::sum('transport_allowance');
        $totalAirtimeAllowance  = Salary::sum('airtime_allowance');
        $totalNhifAllowance  = Salary::sum('nhif');
        $totalIncomeTax  = Salary::sum('incomeTax');
        $totalPayee  = Salary::sum('payee');
        $totalNetPay  = Salary::sum('net_pay');

        return view('salaries.hq.index', compact('userpayroll','salaries','totalAirtimeAllowance','totalNetPay','totalPayee','totalIncomeTax','totalNhifAllowance','totalTransportAllowance','totalHseAllowance','totalBasicSalary','employees', 'jobgroup'));

    }





}

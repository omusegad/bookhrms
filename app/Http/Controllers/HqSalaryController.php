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
    public function index()
    {
        $employees = User::all();
        $payroll = Payroll::where('status','processed')->with('salary','user')->get();
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

        return view('salaries.hq.index', compact('payroll','salaries','totalAirtimeAllowance','totalNetPay','totalPayee','totalIncomeTax','totalNhifAllowance','totalTransportAllowance','totalHseAllowance','totalBasicSalary','employees', 'jobgroup'));
   
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Payroll;
use Illuminate\Http\Request;

class PayrollController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){

        $payroll = Payroll::with('user')->get();
        $totalBasicSalary  = Payroll::sum('basic_salary');
        $totalGrossPay  = Payroll::sum('gross_pay');
        $totalnhif  = Payroll::sum('nhifAmount');
        $totalnssf  = Payroll::sum('nssfAmount');
        $totalPayee  = Payroll::sum('payee');
        $totalAfterTaxPay  = Payroll::sum('total_salary');
        $totalNetSalary  = Payroll::sum('net_salary');
        return view('payroll.index', compact('payroll','totalBasicSalary','totalGrossPay','totalnhif','totalnssf','totalPayee','totalAfterTaxPay','totalNetSalary'));
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
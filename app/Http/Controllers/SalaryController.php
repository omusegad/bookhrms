<?php

namespace App\Http\Controllers;

use App\Models\Nhif;
use App\Models\Nssf;
use App\Models\User;
use App\Models\Salary;
use App\Models\Jobgroup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\MonthlyTaxableIncome;
use Illuminate\Support\Facades\Artisan;

class SalaryController extends Controller{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){

        $employees = User::all();
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

      return view('salaries.index', compact('salaries','jobgroup','employees','totalAirtimeAllowance','totalNetPay','totalPayee','totalIncomeTax','totalNhifAllowance','totalTransportAllowance','totalHseAllowance','totalBasicSalary'));

      }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){


        $data = $request->all();

       ///Get active nssf band
       $nssf  = Nssf::where('status', 'active')->pluck('amount')->first();
        //Check if salary exists
        $existingSalary = Salary::where('user_id', $data['user_id'])->first();
        if($existingSalary){

            DB::table('salaries')->update([
                'user_id'             => $data['user_id'],
                'job_group'           => $data['job_group'],
                'basic_salary'        => $data['basic_salary'],
                'transport_allowance' => $data['transport_allowance'],
                'hse_allowance'       => $data['hse_allowance'],
                'airtime_allowance'   => $data['airtime_allowance'],
                'hospitality_allowance' => $data['hospitality_allowance'],
                'gross_pay'         => $data['gross_pay'],
                'payee'                => $data['payee'],
                'personalRelief'      => $data['personalRelief'],
                'incomeTax'           => $data['incomeTax'],
                'nhif'                => $data['nhif'],
                'nssf'                => $nssf,
                'net_pay'             => $data['net_pay'],
                'bankName'            => $data['bankName'],
                'bankBranch'          => $data['bankBranch'],
                'bankCode'            => $data['bankCode'],
                'otherDeductions'      => $data['otherDeductions'] ?  $data['otherDeductions'] : 0,
                'beneficiaryAccountNumber' => $data['beneficiaryAccountNumber'],
                'reference'  => $data['reference']

            ]);

            return back()->with('message','Salary Updated successfully!');
        }else{

            Salary::Create([
                'user_id'        => $data['user_id'],
                'job_group'           => $data['job_group'],
                'basic_salary'        => $data['basic_salary'],
                'transport_allowance' => $data['transport_allowance'],
                'hse_allowance'       => $data['hse_allowance'],
                'airtime_allowance'   => $data['airtime_allowance'],
                'hospitality_allowance' => $data['hospitality_allowance'],
                'gross_pay'         => $data['gross_pay'],
                'payee'                => $data['payee'],
                'personalRelief'      => $data['personalRelief'],
                'incomeTax'           => $data['incomeTax'],
                'nhif'                => $data['nhif'],
                'nssf'                => $nssf,
                'net_pay'             => $data['net_pay'],
                'bankBranch'          => $data['bankBranch'],
                'bankName'            => $data['bankName'],
                'bankCode'            => $data['bankCode'],
                'otherDeductions'      => $data['otherDeductions'] ?  $data['otherDeductions'] : 0,
                'beneficiaryAccountNumber' => $data['beneficiaryAccountNumber'],
                'reference'  => $data['reference']
            ]);
            return back()->with('message','Salary created successfully!');
        }

    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id){
        $salary   = Salary::where('id',$id)->with('users')->first();
        $jobgroup = Jobgroup::all();
        return view('salaries.edit', compact('salary', 'jobgroup'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id){
      //dd($request->all());

       Salary::where('id',$id)->update([
            'basic_salary'                  => $request['basic_salary'],
            'transport_allowance'           => $request['transport_allowance'] ? $request['transport_allowance'] : 0,
            'hse_allowance'                 => $request['hse_allowance'] ?  $request['hse_allowance'] : 0,
            'airtime_allowance'             => $request['airtime_allowance'] ? $request['airtime_allowance'] : 0,
            'hospitality_allowance'         => $request['hospitality_allowance'],
            'gross_pay'                     => $request['gross_pay'],
            'payee'                         => $request['payee'],
            'personalRelief'                => $request['personalRelief'],
            'incomeTax'                     => $request['incomeTax'],
            'nssf'                          => $request['nssf'],
            'nhif'                          => $request['nhif'],
            'net_pay'                       => $request['net_pay'],
            'bankName'                  => $request['bankName'],
            'bankBranch'                => $request['bankBranch'],
            'bankCode'                  => $request['bankCode'],
            'otherDeductions'       => $request['otherDeductions'] ?  $request['otherDeductions'] : 0,
            'beneficiaryAccountNumber'      => $request['beneficiaryAccountNumber'],

        ]);
        return redirect()->route('salaries.edit',$id)->with('message','Salary updated successfully!');
    }








}

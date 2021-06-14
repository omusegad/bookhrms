<?php

namespace App\Http\Controllers;

use App\Models\Salary;
use App\Models\Payroll;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PayrollController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $payroll = Payroll::where('status','processed')->with('user')->get();
        return view('payroll.index', compact('payroll'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        $record = $request->all();

        $checkMonth = Payroll::where('user_id', $record['user_id'])->where('month', now()->month)->where('year', now()->year)->get();
        if($checkMonth->isEmpty()){
                Payroll::Create([
                    'user_id'    =>$record['user_id'],
                    'approvedBy' =>  Auth::user()->id,
                    'basic_salary'  =>  $record['basic_salary'],
                    'gross_pay'  =>  $record['gross_pay'],
                    'nssf'  =>  $record['nssf'],
                    'nhif'  =>  $record['nhif'],
                    'payee'  =>  $record['payee'],
                    'net_pay'  =>  $record['net_pay'],
                    'bankName'  =>  $record['bankName'],
                    'bankBranch'  =>  $record['bankBranch'],
                    'bankCode'  =>  $record['bankCode'],
                    'beneficiaryAccountNumber'  =>  $record['beneficiaryAccountNumber'],
                    'reference'  => "Salary",
                    'month'      => now()->month,
                    'year'       => now()->year,
                    'status'     =>  $record['status'],

                ]);
        return back()->with('message','Payment Updated successfully!');

           }else{
                Payroll::updateOrCreate([
                    'user_id'    =>$record['user_id'],
                    'approvedBy' =>  Auth::user()->id,
                    'basic_salary'  =>  $record['basic_salary'],
                    'gross_pay'  =>  $record['gross_pay'],
                    'nssf'  =>  $record['nssf'],
                    'nhif'  =>  $record['nhif'],
                    'payee'  =>  $record['payee'],
                    'net_pay'  =>  $record['net_pay'],
                    'bankName'  =>  $record['bankName'],
                    'bankBranch'  =>  $record['bankBranch'],
                    'bankCode'  =>  $record['bankCode'],
                    'beneficiaryAccountNumber'  =>  $record['beneficiaryAccountNumber'],
                    'reference'  => "Salary",
                    'month'      => now()->month,
                    'year'       => now()->year,
                    'status'     =>  $record['status'],
                ]);
            return back()->with('message','Payment proccessed successfully!');

        }


    }

    public function processall(Request $request){
        $data = $request->all();
        //dd($data);

        if(!$data){
            return back()->with('message','Please select what you would like proccessed!');
        }

       // return  $data;
        foreach($data['salaries'] as $id ){
            $record     =  Salary::where('user_id', (int)$id)->first();

            $checkMonth =  Payroll::where('month', now()->month)
                           ->where('year', now()->year)->get(); //Check month
            // dd($checkMonth);
           // return $checkMonth;
           if($checkMonth->isEmpty()){
                Payroll::Create([
                    'user_id'    => $id,
                    'approvedBy' =>  Auth::user()->id,
                    'basic_salary'  =>  $record['basic_salary'],
                    'gross_pay'  =>  $record['gross_pay'],
                    'nssf'  =>  $record['nssf'],
                    'nhif'  =>  $record['nhif'],
                    'payee'  =>  $record['payee'],
                    'net_pay'  =>  $record['net_pay'],
                    'bankName'  =>  $record['bankName'],
                    'bankBranch'  =>  $record['bankBranch'],
                    'bankCode'  =>  $record['bankCode'],
                    'beneficiaryAccountNumber'  =>  $record['beneficiaryAccountNumber'],
                    'reference'  => "Salary",
                    'month'      => now()->month,
                    'year'       => now()->year,
                ]);
           }else{
                Payroll::updateOrCreate([
                    'user_id'    => $id,
                    'approvedBy' =>  Auth::user()->id,
                    'basic_salary'  =>  $record['basic_salary'],
                    'gross_pay'  =>  $record['gross_pay'],
                    'nssf'  =>  $record['nssf'],
                    'nhif'  =>  $record['nhif'],
                    'payee'  =>  $record['payee'],
                    'net_pay'  =>  $record['net_pay'],
                    'bankName'  =>  $record['bankName'],
                    'bankBranch'  =>  $record['bankBranch'],
                    'bankCode'  =>  $record['bankCode'],
                    'beneficiaryAccountNumber'  =>  $record['beneficiaryAccountNumber'],
                    'reference'  => "Salary",
                    'month'      => now()->month,
                    'year'       => now()->year,
                ]);
           }

        }

      return redirect()->route('hq-salaries.index');

    }


}

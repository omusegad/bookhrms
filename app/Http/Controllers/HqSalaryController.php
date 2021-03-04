<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Salary;
use App\Models\Payroll;
use App\Models\Jobgroup;
use Illuminate\Http\Request;
use App\Exports\HqPayrollExport;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

class HqSalaryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){

        $userpayroll = User::where('employee_type','HQ')->whereHas('payroll', function($q) {
            $q->where('month', '=',  Carbon::now()->month);
        })->get();

        $hqsalary = User::where('employee_type','HQ')->with('salary')->get();
       //dd( $hqsalary );

        return view('salaries.hq.index', compact('userpayroll','hqsalary'));

    }

    // Download excel
    public function exportexcel(){
        return Excel::download(new HqPayrollExport, 'hq-employees-salary.xlsx');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
          $data = $request->input('userID');

         if(!$data['userID']){
             return back()->with('message','Please select what you would like proccessed!');
         }

        // return  $data;
         foreach($data['userID'] as $id ){
             $record     =  Salary::where('user_id', (int)$id)->first();

             $checkMonth =  Payroll::where('month', now()->month)
                            ->where('year', now()->year)->get(); //Check month

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

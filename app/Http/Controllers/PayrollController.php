<?php

namespace App\Http\Controllers;

use App\Models\User;
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
                    'user_id'    => $record['user_id'],
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
              Payroll::whereId($record['user_id'])->update([
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
       // return $request->all();
       /// Need to cascade useer to salary relationship on delete to delete all
        if($request->ajax()){
            $result = $request->salaries;

                  for ($x = 0; $x <= $result; $x++) {
                    print_r($x);
                  }

            foreach ($result as $key => $userid) {
               // echo "$key => $value\n";
               $record =  Salary::where('user_id', $userid)->first();
              // return $record->user_id;

                //    for ($x = 0; $x <= $record; $x++) {
                //     echo "The number is: $x <br>";
                //   }

               if(isset($record)){
                   Payroll::create([
                       'user_id'    => $record->user_id,
                       'approvedBy' =>  Auth::user()->id,
                       'basic_salary'  =>  $record->basic_salary,
                       'gross_pay'  =>  $record->gross_pay,
                       'nssf'  =>  $record->nssf,
                       'nhif'  =>  $record->nhif,
                       'payee'  =>  $record->payee,
                       'net_pay'  =>  $record->net_pay,
                       'bankName'  =>  $record->bankName,
                       'bankBranch'  =>  $record->bankBranch,
                       'bankCode'  =>  $record->bankCode,
                       'beneficiaryAccountNumber'  =>  $record->beneficiaryAccountNumber,
                       'reference'  => "Salary",
                       'month'      => now()->month,
                       'year'       => now()->year,
                   ]);
              }

        }



      //  foreach($data as $key => $id ){
            // if(User::where('id', $id)){
            //     $record =  Salary::where('user_id', $id)->get();
            //  //   return response()->json([$record, 401,]);
            //     if(isset($record)){
            //        $checkThisMonthpayroll = Payroll::where('user_id', $id)->where('month', now()->month)->where('year', now()->year)->count();
            //       // return response()->json([$id, 401,]);

            //        if($checkThisMonthpayroll == 0){
            //             Payroll::Create([
            //                 'user_id'    => $record['user_id'],
            //                 'approvedBy' =>  Auth::user()->id,
            //                 'basic_salary'  =>  $record['basic_salary'],
            //                 'gross_pay'  =>  $record['gross_pay'],
            //                 'nssf'  =>  $record['nssf'],
            //                 'nhif'  =>  $record['nhif'],
            //                 'payee'  =>  $record['payee'],
            //                 'net_pay'  =>  $record['net_pay'],
            //                 'bankName'  =>  $record['bankName'],
            //                 'bankBranch'  =>  $record['bankBranch'],
            //                 'bankCode'  =>  $record['bankCode'],
            //                 'beneficiaryAccountNumber'  =>  $record['beneficiaryAccountNumber'],
            //                 'reference'  => "Salary",
            //                 'month'      => now()->month,
            //                 'year'       => now()->year,
            //             ]);

            //         }else{
            //            // update salary for this month
            //             Payroll::whereId($record['user_id'])->update([
            //                 'user_id'    =>$record['user_id'],
            //                 'approvedBy' =>  Auth::user()->id,
            //                 'basic_salary'  =>  $record['basic_salary'],
            //                 'gross_pay'  =>  $record['gross_pay'],
            //                 'nssf'  =>  $record['nssf'],
            //                 'nhif'  =>  $record['nhif'],
            //                 'payee'  =>  $record['payee'],
            //                 'net_pay'  =>  $record['net_pay'],
            //                 'bankName'  =>  $record['bankName'],
            //                 'bankBranch'  =>  $record['bankBranch'],
            //                 'bankCode'  =>  $record['bankCode'],
            //                 'beneficiaryAccountNumber'  =>  $record['beneficiaryAccountNumber'],
            //                 'reference'  => "Salary",
            //                 'month'      => now()->month,
            //                 'year'       => now()->year,
            //             ]);

            //        }
            //     }
            // }else{
            //     return response()->json(['Salary' => "Salary does not exist, please create|"]);
            // }


        }
        // return response()->json(['message' => 'Payroll generated successfully!', 401, ]);

    }


}

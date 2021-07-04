<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Salary;
use App\Models\Payroll;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
        return response()->json($record);
        exit;

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
        if($request->ajax()){
            $result = $request->input('id');
            if(empty($result) == 1){
                return response()->json([
                      'result' => empty($result),
                      'message' => "Please select salaries to process this payroll !",
                ]);
            }else{

                $count = 1;
                for ($x = 0; $x <count($result); $x++) {
                    //echo $result[$x];
                    $record = $this->getSalary($result[$x]);
                    if(isset($record)){
                         $checkMonth = Payroll::where('user_id', $record['user_id'])->where('month', 2)->where('year', now()->year)->get();
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
                                    'incomeTax'  =>  $record['incomeTax'],
                                    'personalRelief'  =>  $record['personalRelief'],
                                    // 'otherDeductions'  =>  $record['otherDeductions'],
                                    'beneficiaryAccountNumber'  =>  $record['beneficiaryAccountNumber'],
                                    'reference'  => "Salary",
                                    'month'      => 2, //now()->month,
                                    'year'       => now()->year,
                                ]);

                            }else{
                                Payroll::whereId($record['user_id'])->update([
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
                                    'incomeTax'  =>  $record['incomeTax'],
                                    'personalRelief'  =>  $record['personalRelief'],
                                    // 'otherDeductions'  =>  $record['otherDeductions'],
                                    'beneficiaryAccountNumber'  =>  $record['beneficiaryAccountNumber'],
                                    'reference'  => "Salary",
                                    'month'      => 2, //now()->month,
                                    'year'       => now()->year,
                                ]);
                            }
                    }

                }
                return response()->json([
                    "result"   => $count,
                    "message" => "Payroll proccessed successfully!"
                ]);

            }


        }

    }


    private function getSalary($id){
       return Salary::where('user_id' ,$id)->first();
    }


}

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

        $payroll = Payroll::where('status','processed')->with('salary','user')->get();
       // dd( $payroll );
        return view('payroll.index', compact('payroll'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
       // $data = $request->input('userID');
        $data = $request->all();
       // return  $data['userID'];

        // return  $data;
        if(!$data){
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
                    'salary_id'  =>  $record['id'],
                    'month'      => now()->month,
                    'year'       => now()->year,
                ]);
           }else{
                Payroll::updateOrCreate([
                    'user_id'    => $id,
                    'approvedBy' =>  Auth::user()->id,
                    'salary_id'  =>  $record['id'],
                    'month'      => now()->month,
                    'year'       => now()->year,
                ]);
           }

        }

       return redirect()->route('payroll.index');

    }



}

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
        $data = $request->input('userID');
        if(!$data){
            return back()->with('message','Please select what you would like proccessed!');
        }
       
       // return  $data;
        foreach($data as $id){         
       
            $record =  Salary::where('user_id', $id)->first();
            //return $record;
      
            Payroll::updateOrCreate([
                'user_id'    => $id,
                'approvedBy' =>  Auth::user()->id,
                'salary_id'  =>  $record['id'],
                'month'      => now()->month,
                'year'       => now()->year,
            ]);
        }
    
       return redirect()->route('payroll.index');

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

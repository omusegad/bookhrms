<?php

namespace App\Http\Controllers;

use App\Models\Payroll;
use App\Models\Salary;

use Illuminate\Support\Facades\Auth;

class MyPayrollController extends Controller{


    public function index(){
         $mypayroll = Payroll::where(
             'user_id' ,Auth::user()->id
              ) ->with("user","jobgroup")->get();

        return view('employees.payroll.index', compact('mypayroll'));

    }

}

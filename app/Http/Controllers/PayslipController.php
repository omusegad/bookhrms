<?php

namespace App\Http\Controllers;

use App\Models\Salary;
use App\Models\Payroll;
use APP\Models\User;
use Illuminate\Http\Request;
use PDF;

class PayslipController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('payslip.index');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id){
        $payslip = Payroll::where('id',$id)
                        ->with('user','jobgroup')->first();


        $pdf = PDF::loadView('payslip.index', ['payslip' => $payslip]);

        return $pdf->download('payslip.pdf');
    }

}

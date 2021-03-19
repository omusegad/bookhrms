<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class HqEmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $users = User::where('employee_type','HQ')->with('region','dcc','lcc','jobgroup')->get();
        return view('employees.hq.index', compact('users'));
    }

    // Download excel
    public function exportexcel(Request $request){
        dd($request->input('userID'));
        return Excel::download(new HqPayrollExport, 'hq-employees-salary.xlsx');
    }




}

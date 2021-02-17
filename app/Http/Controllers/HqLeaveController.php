<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\LeaveApplication;

class HqLeaveController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $leaves =  LeaveApplication::with(['leavetype','users' => function ($q) {
            $q->where('employee_type', 'HQ');
        }])->get();

        //dd( $leaves );

        return view('leaves.hq.index',compact('leaves'));

    }






}

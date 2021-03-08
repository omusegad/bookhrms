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
        $leaves = LeaveApplication::whereHas('users', function($q) {
            $q->where('employee_type', 'HQ');
        })->get();

        return view('leaves.hq.index',compact('leaves'));

    }






}

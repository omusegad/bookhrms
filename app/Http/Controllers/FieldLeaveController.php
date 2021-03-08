<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LeaveApplication;

class FieldLeaveController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $leaves = LeaveApplication::whereHas('users', function($q) {
            $q->where('employee_type', 'FIELD');
        })->get();

        return view('leaves.field.index', compact('leaves'));
    }



}

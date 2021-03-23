<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class FieldEmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $users = User::where('employee_type','FIELD')->orderBy('fname')->with('region','dcc','lcc','jobgroup')->get();
        return view('employees.field.index', compact('users'));
    }



}

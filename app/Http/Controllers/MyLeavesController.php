<?php

namespace App\Http\Controllers;

use App\Models\LeaveApplication;
use Illuminate\Support\Facades\Auth;

class MyLeavesController extends Controller{


    public function index(){
         $leaves = LeaveApplication::where(
             'user_id' ,Auth::user()->id
              ) ->with("users","leavetype")->get();

        return view('leaves.myleaves', compact('leaves'));

    }

}

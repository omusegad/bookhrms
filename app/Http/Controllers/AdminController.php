<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){
        $users =  User::role(['AreaBishop','Secretary','HrManager','SuperAdmin','FinanceDirector'])->get();
        return view('admin.index',compact('users'));
    }
}

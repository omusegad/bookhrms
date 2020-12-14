<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Region;
use App\Models\Dccregions;
use App\Models\Lccregions;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $totalRegions = Region::All()->count(); // total regions 
        $employees    = User::All()->count(); // total regions 
        $totalDcc     = Dccregions::All()->count(); //totall dccs 
        $totaLcc      = Lccregions::All()->count(); //total Lcss
        return view('dashboard', compact('employees','totalRegions','totalDcc','totaLcc'));
    }

}

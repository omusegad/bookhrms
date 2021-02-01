<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Region;
use App\Models\Dccregions;
use App\Models\Lccregions;
use App\Models\Salary;
use Illuminate\Http\Request;



class DashboardController extends Controller{


    public function index(){


        $totalRegions = Region::All()->count(); // total regions
        $employees    = User::All()->count(); // total regions
        $totalDcc     = Dccregions::All()->count(); //totall dccs
        $totaLcc      = Lccregions::All()->count(); //total Lcss
        $male         = User::where('gender','male')->count(); //total male gender
        $female       = User::where('gender','female')->count(); //total female
        $totalSalaries = Salary::sum('basic_salary');
        return view('dashboard', compact('employees','totalRegions','totalDcc','totaLcc','male','female','totalSalaries'));
    }

}

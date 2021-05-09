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

        // Artisan::call('cache:clear');
        // Artisan::call('view:clear');
        // Artisan::call('config:cache');
        // Artisan::call('route:cache');

        //Artisan::call('cache:clear');
        $totalRegions = Region::All()->count(); // total regions
        $employees    = User::All()->count(); // total regions
        $totalDcc     = Dccregions::All()->count(); //totall dccs
        $totaLcc      = Lccregions::All()->count(); //total Lcss
        $male         = User::where('gender','male')->count(); //total male gender
        $female       = User::where('gender','female')->count(); //total female
        $totalSalaries = Salary::sum('basic_salary');
        $licencedMalePastors   = User::where([
            'gender'             => 'male',
            'male_pastors_grade' => 'licensed'
            ])->count();
        $unlicencedMalePastors   = User::where([
                'gender'             => 'male',
                'male_pastors_grade' => 'unlicensed'
                ])->count();
        $ordainedMalePastors   = User::where([
                    'gender'             => 'male',
                    'male_pastors_grade' => 'ordained'
                    ])->count();
        $oneToFiveYearsFemalePastors   = User::where([
            'gender'               => 'female',
            'female_pastors_grade' => 'oneToFive'
            ])->count();
        $sixToTenYearsFemalePastors   = User::where([
            'gender'             => 'female',
            'female_pastors_grade' => 'sixToTen'
            ])->count();
        $ElevenAndAboveYearsFemalePastors   = User::where([
            'gender'             => 'female',
            'female_pastors_grade' => 'ElevenAndAbove'
            ])->count();

        return view('dashboard', compact('ElevenAndAboveYearsFemalePastors','sixToTenYearsFemalePastors','oneToFiveYearsFemalePastors','employees','totalRegions','totalDcc','totaLcc','male','female','totalSalaries','licencedMalePastors','unlicencedMalePastors', 'ordainedMalePastors'));
    }

    public function comp(){}

}

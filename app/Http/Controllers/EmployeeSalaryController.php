<?php

namespace App\Http\Controllers;

use App\Models\Nhif;
use App\Models\Nssf;
use App\Models\User;
use App\Models\Salary;
use App\Models\Jobgroup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\MonthlyTaxableIncome;

class EmployeeSalaryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = User::all();
        $jobgroup  = Jobgroup::all();
        $salaries  = Salary::with('users')->get();
       // dd($salaries);
        return view('salaries.index', compact('salaries','employees', 'jobgroup'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $user_id             = $data['user_id'];
        $basicSalary         = $data['basic_salary'];
        $hse_allowance       = $data['hse_allowance'];
        $trasnport_allowance = $data['transport_allowance'];
        $airtime             = $data['airtime_allowance'];

        // calculate total gross salalary
        $grossSalary = $this->getGrossSalary($basicSalary,$hse_allowance,$trasnport_allowance,$airtime);

        // get NHIF Deductions
        $nhif = Nhif::where("status", "active")->pluck('amount')->first();

        // get NSSF Deduction
        $nssf = Nssf::where("status", "active")->pluck('amount')->first();

        //get and calcullate P.A.Y.
        $payeTax = $this->calculatePaye($grossSalary);

        // calaculate total sallary without P.A.Y.E //  this needs Paye deductions
        $netSalary = ( $grossSalary - ($nhif  + $nssf + $payeTax ));

        // Check if salary exists
        $existingSalary = Salary::where('user_id',  $user_id)->first();
        if($existingSalary){

            DB::table('employee_salary')->update([
                'user_id'             => $user_id,
                'education'           => $data['education'],
                'grade'               => $data['grade'],
                'job_group'           => $data['job_group'],
                'basic_salary'        => $basicSalary,
                'current_salary'      => $data['current_salary'],
                'hse_allowance'       => $hse_allowance,
                'transport_allowance' => $trasnport_allowance,
                'airtime_allowance'   => $airtime,
                'net_salary'          =>  $netSalary,
            ]);

            return back()->with('message','Salary Updated successfully!');
        }else{

            Salary::Create([
                'user_id'        =>  $user_id,
                'education'      => $data['education'],
                'grade'          => $data['grade'],
                'job_group'           => $data['job_group'],
                'basic_salary'        => $basicSalary,
                'current_salary'      => $data['current_salary'],
                'hse_allowance'       => $hse_allowance,
                'transport_allowance' => $trasnport_allowance,
                'airtime_allowance'   => $airtime,
                'net_salary'        =>  $netSalary,
            ]);
            return back()->with('message','Salary created successfully!');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id){
        $salary   = Salary::findOrFail($id)->first();
        $jobgroup = Jobgroup::all();
        return view('salaries.edit', compact('salary', 'jobgroup'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id){

        $data = Salary::findOrFail($id)->first();
        Salary::update([
            'education'           => $data['education'],
            'grade'               => $data['grade'],
            'job_group'           => $data['job_group'],
            'basic_salary'        => $data['basic_salary'],
            'hse_allowance'       => $data['hse_allowance'],
            'transport_allowance' => $data['transport_allowance'],
            'airtime_allowance'   => $data['airtime_allowance'],
            'net_salary'          => $netSalary,
        ]);
        return back()->with('message','Salary updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    private function getGrossSalary($basicSalary,$hse_allowance,$trasnport_allowance,$airtime){
      return ($basicSalary + $hse_allowance + $trasnport_allowance + $airtime);
    }

    private function calculatePaye($grossSalary){

        //$getPaye = MonthlyTaxableIncome::all();
        $bandOne   = 24000;
        $bandTwo   = 40666.67;
        $bandThree = 57333.34;

        switch ($grossSalary) {
            case $grossSalary > 0 && $grossSalary <= $bandOne:
              return (($grossSalary * 10)/100);
              break;
            case ($grossSalary > $bandOne && $grossSalary <= $bandTwo):
              return (($grossSalary * 15)/100);
              break;
            case ($grossSalary > $bandTwo && $grossSalary <= $bandThree):
              return (($grossSalary * 20)/100);
              break;
            case ($grossSalary > $bandThree):
              return (($grossSalary * 25)/100);
              break;
            default:
              return " ";
        }
    }


}

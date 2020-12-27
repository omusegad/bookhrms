<?php

namespace App\Http\Controllers;

use App\Models\Nhif;
use App\Models\Nssf;
use App\Models\User;
use App\Models\Salary;
use App\Models\Jobgroup;
use Illuminate\Http\Request;

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
        //dd($salaries);
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
        $basicSalary         = $data['basic_salary'];
        $hse_allowance       = $data['hse_allowance'];
        $trasnport_allowance = $data['transport_allowance'];
        $airtime             = $data['airtime_allowance'];

        // calculate total gross salalary
        $grossSalary = $this->getGrossSalary($basicSalary,$hse_allowance,$trasnport_allowance,$airtime);
       // dd($grossSalary);

        // get NHIF Deductions
        $nhif = Nhif::where("status", "active")->pluck('amount')->first();

        // get NSSF Deduction
        $nssf = Nssf::where("status", "active")->pluck('amount')->first();


        // calaculate total sallary without P.A.Y.E //  this needs Paye deductions
        $netSalary = ( $grossSalary - ($nhif  + $nssf));
       // dd($netSalary);

        /*=========
          Now ted you will have to create a table with paye details group them for easy calculations
          Then you will featch this data from table and calculate net salasyr from unfinished net salo above
        ===================*/


        Salary::create([
            'user_id'        => $data['user_id'],
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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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


}

<?php

namespace App\Http\Controllers;

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
        $totalSalary  = ($data['basic_salary'] + $data['hse_allowance'] + $data['transport_allowance']) + $data['airtime_allowance'];

        Salary::create([
            'user_id'        => 1 , //$data['user_id']
            'education'      => $data['education'],
            'grade'          => $data['grade'],
            'job_group'           => $data['job_group'],
            'basic_salary'        => $data['basic_salary'],
            'current_salary'      => $data['current_salary'],
            'hse_allowance'       => $data['hse_allowance'],
            'transport_allowance' => $data['transport_allowance'],
            'airtime_allowance'   => $data['airtime_allowance'],
            'total_salary'   => $totalSalary,
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
}

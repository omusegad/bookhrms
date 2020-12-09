<?php

namespace App\Http\Controllers;

use App\Models\Jobgroup;
use Illuminate\Http\Request;

class JobgroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jobGroups = Jobgroup::all();
        return view('jobgroups.index', compact('jobGroups'));
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
    public function store(Request $request){
        // dd($request->all());
        Jobgroup::create([
            'jonGroupName'        => $request->jonGroupName,
            'job_grade'           => $request->job_grade,
            'basic_salary'        => $request->basic_salary,
            'level'               => $request->level,
            'hse_allowance'       => $request->hse_allowance,
            'transport_allowance' => $request->transport_allowance,
            'airtime'              => $request->airtime,
        ]);
        return back()->with('message','Region has been created successfully!');
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

<?php

namespace App\Http\Controllers;

use App\Models\Region;
use App\Models\Jobgroup;
use App\Models\Dccregions;
use App\Models\Lccregions;
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
        $totalRegions = Region::All()->count(); // total regions
        $totalDcc     = Dccregions::All()->count(); //totall dccs
        $totaLcc      = Lccregions::All()->count();
        return view('jobgroups.index', compact('jobGroups','totalRegions', 'totalDcc','totaLcc'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        $data =  $request->all();
        Jobgroup::create([
            'jonGroupName'        => $data['jonGroupName']
        ]);
        return back()->with('message','Job group created successfully!');
    }


   /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $groups = Jobgroup::findorFail($id);
        return view('jobgroups.edit', compact('groups'));
    }

    public function update(Request $request, $id){
        Jobgroup::where('id',$id)->update([
            'jonGroupName' => $request->input('jonGroupName'),
        ]);
        return redirect('/job-groups')->with('message','Job Group updated successfully!');
    }



}

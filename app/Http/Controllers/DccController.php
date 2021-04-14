<?php

namespace App\Http\Controllers;

use App\Models\Region;
use App\Models\Dccregions;
use App\Models\Lccregions;
use Illuminate\Http\Request;

class DccController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dcc = Dccregions::All();
        $regions = Region::All();
        $totalRegions = Region::All()->count(); // total regions
        $totalDcc     = Dccregions::All()->count(); //totall dccs
        $totaLcc      = Lccregions::All()->count(); //total Lcss
        return view('dcc.index', compact('dcc','regions','totalRegions','totalDcc','totaLcc'));
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){

        Dccregions::create([
            'dccName'        => $request->dccName,
            'aic_regions_id' => $request->regionID,
        ]);
        return back()->with('message','Region has been created successfully!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $dcc = DccRegions::findorFail($id);
        return view('dcc.edit', compact('dcc'));
    }

    public function update(Request $request, $id){
        DccRegions::where('id',$id)->update([
            'dccName' => $request->input('dccName'),
        ]);
        return redirect('/dccs-regions')->with('message','DCC updated successfully!');
    }

    public function destroy($id){
        DccRegions::find($id)->delete();
        return back()->with('message','DCC deleted successfully!');
    }



}

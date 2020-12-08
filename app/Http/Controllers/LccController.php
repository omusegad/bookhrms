<?php

namespace App\Http\Controllers;

use App\Models\Region;
use App\Models\Dccregions;
use App\Models\Lccregions;
use Illuminate\Http\Request;

class LccController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $lcc = Lccregions::All();
        //dd($dcc->regions);
        $totalRegions = Region::All()->count(); // total regions 
        $totalDcc     = Dccregions::All()->count(); //totall dccs 
        $totaLcc      = Lccregions::All()->count(); //total Lcss
        return view('lcc.index', compact('lcc','totalRegions','totalDcc','totaLcc'));

    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Lccregions::create([
            'lccName'       => $request->dccName,
            'aic_dccs_id'   => 1,
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

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
        $dcc     = Dccregions::All(); //totall dccs
        $totalRegions = Region::All()->count(); // total regions
        $totalDcc     = Dccregions::All()->count(); //totall dccs
        $totaLcc      = Lccregions::All()->count(); //total Lcss
        return view('lcc.index', compact('lcc','dcc','totalRegions','totalDcc','totaLcc'));

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
            'aic_dccs_id'   => $request->dccID,
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
    public function edit($id){
        $lcc = Lccregions::findorFail($id);
        return view('lcc.edit', compact('lcc'));
    }




}

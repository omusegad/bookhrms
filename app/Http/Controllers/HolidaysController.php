<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Holiday;
use Illuminate\Http\Request;

class HolidaysController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $holidays = Holiday::all();
        return view('holiday.index', compact('holidays'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        $data = $request->all();

        Holiday::create([
            'hName'       => $data['hName'],
            'holidayDate' => Carbon::parse(strtotime($data['holidayDate'])),
        ]);

        return back()->with('message','Holiday created successfully!');
        //
    }

    public function update(Request $request, $id){
        Holiday::where('id',$id)->update([
            "hName"            =>  $request['hName'],
            "holidayDate"    =>  Carbon::parse(strtotime($request['holidayDate'])),
        ]);

        return back()->with('message','Holiday updated successfully!');

    }

}

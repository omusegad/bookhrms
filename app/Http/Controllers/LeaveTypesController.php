<?php

namespace App\Http\Controllers;

use App\Models\LeaveType;
use Illuminate\Http\Request;

class LeaveTypesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $leave = LeaveType::all();
        return view('leaves.leavetypes.index', compact('leave'));
    }

   
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        // $data = $request->validate([
        //     "leaveType" => ['required', 'String'],
        //     "leaveDays" => ['numeric'],
        // ]);
        $data = $request->all();
        LeaveType::create([
            'leaveType' => $data['leaveType'],
            'leaveDays' => $data['leaveDays'],
        ]);
        return back()->with('message','Region has been created successfully!');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id){
        $type = LeaveType::find($id);
        return view('leaves.leavetypes.edit', compact('type'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id){
        // dd($request->all());
        LeaveType::where('id',$id)->update([
            'leaveType' => $request->input('leaveType'),
            'leaveDays' => $request->input('leaveDays'),

        ]);
        return redirect('/leave-types')->with('message','Leave Type updated successfully!');
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

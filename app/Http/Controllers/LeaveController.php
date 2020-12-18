<?php

namespace App\Http\Controllers;

use App\Models\LeaveType;
use Illuminate\Http\Request;
use App\Models\LeaveApplication;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class LeaveController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $leaveTpes = LeaveType::all();
        $leaves    = LeaveApplication::with('users','leavetype')->get();
        return view('leaves.index', compact('leaveTpes','leaves'));
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
        $data = $request->all();
       // dd($data);

       //get application by submitted leave category
    //    $checkExistLeave = LeaveApplication::where('id', $data['aic_leave_type_id'])
    //                       -> where(Auth::user()->id, $data['user_id'])
    //                       ->first();
    //    $leaveType       = LeaveType::where('id', $data['aic_leave_type_id'])->first();

       //dd($leaveType['id']);

    //    dd($checkExistLeave);

    //    switch ($leaveType['id']) {
    //     case label1:
    //       code to be executed if n=label1;
    //       break;
    //     case label2:
    //       code to be executed if n=label2;
    //       break;
    //     case label3:
    //       code to be executed if n=label3;
    //       break;
    //     default:
    //       return "";
    //   }

       LeaveApplication::create([
            'user_id'            => Auth::user()->id,
            'aic_leave_type_id'  => $data['aic_leave_type_id'],
            'start_date'     => Carbon::parse(strtotime($data['start_date'])),
            'end_date'       => Carbon::parse(strtotime($data['end_date'])),
            'days'           => $data['days'],
            'reason'         => $data['reason'],
        ]);
        return back()->with('message','Leave application successfully!');
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

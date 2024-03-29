<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Holiday;
use App\Models\LeaveType;
use Illuminate\Http\Request;
use App\Models\LeaveApplication;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

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
        $leaveTpes = LeaveType::all();
        return view('leaves.create', compact('leaveTpes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        $data = $request->all();
        $leaveTypeId = $data['aic_leave_type_id'];
        $appliedDays = $data['appliedDays'];
        $start_date  = Carbon::parse(strtotime($data['start_date']));
        $end_date    = Carbon::parse(strtotime($data['end_date']));
        $reason      = $data['reason'];

        // check if leave record exists
        $existingLeaveApplication = $this->getExistingLeaveApplication($leaveTypeId);
        if($existingLeaveApplication){
            $remaingLeaveDays = $this->getRemaningLeaveDays($leaveTypeId);
            //Calculate remianing Leave days
            if($remaingLeaveDays === 0 && $remaingLeaveDays != null){
                return back()->with('message','Leave application not successful, your remaining days : '.$remaingLeaveDays );
            }
            if($remaingLeaveDays > 0 ){
               if($appliedDays > $remaingLeaveDays){
                  return back()->with('message','Days applied for is more than your remaining : '.$remaingLeaveDays . " days");
               }else{
                    $currentDays =( $remaingLeaveDays - $appliedDays );
                    DB::table('aic_leave_applications')->where("aic_leave_type_id", $leaveTypeId)->update([
                        'remainingDays' =>  $currentDays,
                        'appliedDays'   =>  $appliedDays,
                        'start_date'     =>  $start_date,
                        'end_date'       =>  $end_date,
                        'aic_leave_type_id' => $leaveTypeId,
                        'reason'            => $reason
                    ]);
                    return back()->with('message','Leave application successfully!');
                 }

            }
            // dd($remmianigDays);
        }else{
            $getLeaveType = LeaveType::where('id',$leaveTypeId)->first();
            if($getLeaveType['leaveType'] === "Study"){
                 LeaveApplication::create([
                    'user_id'            => Auth::user()->id,
                    'aic_leave_type_id'  => $leaveTypeId,
                    'start_date'         => $start_date,
                    'end_date'           => $end_date,
                    'appliedDays'        => $appliedDays,
                    'reason'             => $reason,
                ]);
                return back()->with('message','Leave application successfully!');
            }else{
                $newRemainingDays =( $getLeaveType['leaveDays'] - $appliedDays );
                LeaveApplication::create([
                    'user_id'            => Auth::user()->id,
                    'aic_leave_type_id'  => $leaveTypeId,
                    'start_date'         => $start_date,
                    'end_date'           => $end_date,
                    'appliedDays'        => $appliedDays,
                    'remainingDays'      => $newRemainingDays,
                    'reason'             => $reason,
                ]);
                return back()->with('message','Leave application successfully!');
            }
        }

        //$holidays   = Holiday::all();


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



    private function getDays($startDate,$endDate){
        //Number of days
        $noDays = $startDate->diffInDays($endDate);
        return $noDays;
    }


    //check if leave type application exists
    private function getExistingLeaveApplication($leaveTypeId){
        return LeaveApplication::where(
                'aic_leave_type_id',
                $leaveTypeId)
                ->where('user_id', Auth::user()->id)
                ->first();
    }

    private function getRemaningLeaveDays($leaveTypeId){
        return LeaveApplication::where("aic_leave_type_id", $leaveTypeId)->pluck("remainingDays")->first();
    }

     //The total number of days between the two dates. We compute the no. of seconds and divide it to 60*60*24
        //We add one to inlude both dates in the interval.
        // $days = ($endDate - $startDate) / 86400 + 1;

        // $no_full_weeks = floor($days / 7);
        // $no_remaining_days = fmod($days, 7);

        // //It will return 1 if it's Monday,.. ,7 for Sunday
        // $the_first_day_of_week = date("N", $startDate);
        // $the_last_day_of_week = date("N", $endDate);

        // //---->The two can be equal in leap years when february has 29 days, the equal sign is added here
        // //In the first case the whole interval is within a week, in the second case the interval falls in two weeks.
        // if ($the_first_day_of_week <= $the_last_day_of_week) {
        //     if ($the_first_day_of_week <= 6 && 6 <= $the_last_day_of_week) $no_remaining_days--;
        //     if ($the_first_day_of_week <= 7 && 7 <= $the_last_day_of_week) $no_remaining_days--;
        // }
        // else {
        //     // (edit by Tokes to fix an edge case where the start day was a Sunday
        //     // and the end day was NOT a Saturday)

        //     // the day of the week for start is later than the day of the week for end
        //     if ($the_first_day_of_week == 7) {
        //         // if the start date is a Sunday, then we definitely subtract 1 day
        //         $no_remaining_days--;

        //         if ($the_last_day_of_week == 6) {
        //             // if the end date is a Saturday, then we subtract another day
        //             $no_remaining_days--;
        //         }
        //     }
        //     else {
        //         // the start date was a Saturday (or earlier), and the end date was (Mon..Fri)
        //         // so we skip an entire weekend and subtract 2 days
        //         $no_remaining_days -= 2;
        //     }
        // }

        // $workingDays = $no_full_weeks * 5;
        // if ($no_remaining_days > 0 )
        // {
        // $workingDays += $no_remaining_days;
        // }

        // //We subtract the holidays
        // foreach($holidays as $holiday){
        //     $time_stamp=strtotime($holiday);
        //     //If the holiday doesn't fall in weekend
        //     if ($startDate <= $time_stamp && $time_stamp <= $endDate && date("N",$time_stamp) != 6 && date("N",$time_stamp) != 7)
        //         $workingDays--;
        // }

        // return $workingDays;






















}

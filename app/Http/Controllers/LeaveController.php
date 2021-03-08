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
        $pendingLeaves     = LeaveApplication::where('leave_status','pending')->count();
        $approvedLeaves    = LeaveApplication::where('leave_status','approved')->count();
        $declinedLeaves    = LeaveApplication::where('leave_status','declined')->count();

        return view('leaves.index', compact('leaveTpes','leaves','pendingLeaves','approvedLeaves','declinedLeaves'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        $leaveTpes = LeaveType::all();
        $pendingLeaves     = LeaveApplication::where('leave_status','pending')->count();
        $approvedLeaves    = LeaveApplication::where('leave_status','approved')->count();
        $declinedLeaves    = LeaveApplication::where('leave_status','declined')->count();
        return view('leaves.create', compact('leaveTpes','pendingLeaves','approvedLeaves','declinedLeaves'));
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

    private function getCurrentHolidays(){

    }























}

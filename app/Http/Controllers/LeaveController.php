<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Mail\LeaveMail;
use App\Models\Holiday;
use App\Models\LeaveType;
use Illuminate\Http\Request;
use App\Models\LeaveApplication;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\LeaveRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class LeaveController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        // $data = "Hello";
        // Artisan::call('cache:clear');
        // Artisan::call('view:clear');
        // Artisan::call('config:cache');
        // Artisan::call('route:cache');

        $email = ['omusegad@gmail.com','thadeus@peakanddale.com'];
        sendEmail($email);

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
    public function store(LeaveRequest $request){
        $validated = $request->validated();

        $leaveTypeId = $validated['aic_leave_type_id'];
        $appliedDays = $validated['appliedDays'];
        $start_date  = Carbon::parse(strtotime($validated['start_date']));
        $end_date    = Carbon::parse(strtotime($validated['end_date']));
        $reason      = $validated['reason'];

        // Get available holiday between two dates
        $holidays = $this->getHolidaysWithinDateRange($start_date, $end_date);
        if($holidays == []){
            $end_date    = Carbon::parse(strtotime($validated['end_date']));
        }

        // add a day on all available holidays that fall withing leave days
        if($holidays){
            $end_datePlusholidays;
            foreach($holidays as $holidays){
                $end_datePlusholidays = $end_date->addDay();
            }
        }

        // check if leave record exists
        $existingLeaveApplication = $this->getExistingLeaveApplication($leaveTypeId);
        if($existingLeaveApplication){
            $remaingLeaveDays = $this->getRemaningLeaveDays($leaveTypeId);
            $leaveType =  $this->getLeaveType($leaveTypeId);
           // dd( $leaveType);
            //Calculate remianing Leave days
            if($remaingLeaveDays === 0){
                return back()->with('message','Leave application not successful you have exhausted all your ' .$leaveType.' leave days ' );
            }

            if($remaingLeaveDays > 0  ){
               if($appliedDays > $remaingLeaveDays){
                  return back()->with('message','Days applied for is more than your remaining : '.$remaingLeaveDays . " days");
               }else{
                    $currentDays =( $remaingLeaveDays - $appliedDays );
                    $applied = DB::table('aic_leave_applications')->where("aic_leave_type_id", $leaveTypeId)->update([
                        'remainingDays'  =>  $currentDays,
                        'appliedDays'    =>  $appliedDays,
                        'start_date'     =>  $start_date,
                        'end_date'       =>  $end_date ? $end_date : $end_datePlusholidays,
                        'aic_leave_type_id' => $leaveTypeId,
                        'reason'            => $reason
                    ]);
                    if($applied){
                        $leaveName = LeaveType::where('id',$leaveTypeId)->pluck('leaveType');
                        $data = [
                            'LeaveType'   => $leaveName,
                            'appliedDays' => $appliedDays,
                            'start_date'  => $start_date,
                            'end_date'    => $end_date ? $end_date : $end_datePlusholidays,
                            'reason'      => $reason
                        ];
                       // Mail::to(['omusegad@gmail.com','gad@peakanddale.com'])->send(new LeaveMail($data));

                    }
                   // return back()->with('message','Leave application successfully!');
                   return redirect()->route('leaves.index')->with('message','Leave application successfully!');

                 }

            }
            // dd($remmianigDays);
        }else{
            $getLeaveType = LeaveType::where('id',$leaveTypeId)->first();
            if($getLeaveType['leaveType'] === "Study"){
                $done=  LeaveApplication::create([
                    'user_id'            => Auth::user()->id,
                    'aic_leave_type_id'  => $leaveTypeId,
                    'start_date'         => $start_date,
                    'end_date'           => $end_date ? $end_date : $end_datePlusholidays,
                    'appliedDays'        => $appliedDays,
                    'reason'             => $reason,
                ]);
                if($done){
                    $leaveName = LeaveType::where('id',$leaveTypeId)->pluck('leaveType');
                    $data = [
                        'LeaveType'   => $leaveName,
                        'appliedDays' => $appliedDays,
                        'start_date'  => $start_date,
                        'end_date'    => $end_date ? $end_date : $end_datePlusholidays,
                        'reason'      => $reason
                    ];
                    //Mail::to(['omusegad@gmail.com','gad@peakanddale.com'])->send(new LeaveMail($data));
                }
                //return back()->with('message','Leave application successfully!');
                return redirect()->route('leaves.index')->with('message','Leave application successfully!');

            }else{
                $newRemainingDays =( $getLeaveType['leaveDays'] - $appliedDays );
                $created = LeaveApplication::create([
                    'user_id'            => Auth::user()->id,
                    'aic_leave_type_id'  => $leaveTypeId,
                    'start_date'         => $start_date,
                    'end_date'           =>  $end_date ? $end_date : $end_datePlusholidays,
                    'appliedDays'        => $appliedDays,
                    'remainingDays'      => $newRemainingDays,
                    'reason'             => $reason,
                ]);
                if($created){
                    $leaveName = LeaveType::where('id',$leaveTypeId)->pluck('leaveType');
                    $data = [
                        'LeaveType'   => $leaveName,
                        'appliedDays' => $appliedDays,
                        'start_date'  => $start_date,
                        'end_date'    => $end_date ? $end_date : $end_datePlusholidays,
                        'reason'      => $reason
                    ];
                }
                // return back()->with('message','Leave application successfully!');
                return redirect()->route('leaves.index')->with('message','Leave application successfully!');

            }
        }

    }

    public function update(Request $request, $id){
       // dd($request);
        $update = LeaveApplication::where('id',$id)
            ->update([
                'leave_approval_id' => Auth::user()->id,
                'leave_status'      => $request->input('leave_status'),
            ]);
        if($update){
            return back()->with('message','Leave Approved successfully!');
        }

    }


    private function getDays($startDate,$endDate){
        return $startDate->diffInDays($endDate);
    }

    //check if leave type application exists
    private function getExistingLeaveApplication($leaveTypeId){
        return LeaveApplication::where(
                'aic_leave_type_id',
                $leaveTypeId)
                ->where('user_id', Auth::user()->id)
                ->first();
    }

    /// calculate remaining leave days
    private function getRemaningLeaveDays($leaveTypeId){
        return LeaveApplication::where("aic_leave_type_id", $leaveTypeId)->pluck("remainingDays")->first();
    }

    //get leave types
    private function getLeaveType($leaveTypeId){
        return LeaveType::where("id", $leaveTypeId)->pluck("leaveType")->first();
    }

    // get all holidy with start date and end date range
    private function getHolidaysWithinDateRange($start_date , $end_date){
       return Holiday::where('holidayDate', '>=', $start_date)
                           ->where('holidayDate', '<=', $end_date)
                           ->get();
    }



















}

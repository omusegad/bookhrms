<?php

use App\Mail\LeaveMail;
use App\Models\Payroll;
use App\Models\LeaveApplication;
use Illuminate\Support\Facades\Mail;


if (! function_exists('sendEmail')) {
    function sendEmail($email){
        $data = "New Hallo";
        Mail::to($email)->send(new LeaveMail($data));
    }
}

if (! function_exists('thisMonthsPayroll')) {
    function thisMonthsPayroll($user_id){
        $payStatus = Payroll::select('status')->where([
            'user_id' => $user_id,
            'month'   => now()->month
            ])->first();
       // dd($payStatus);
       return isset($payStatus['status']) && !empty($payStatus['status']) ?: '';
    }
}

if (! function_exists('getLeaveStatus')) {
    function getLeaveStatus($user_id){
        $status = LeaveApplication::select('leave_status')
        ->where([
            'user_id'      => $user_id,
        ])->first();
       return $status['leave_status'];
    }
}


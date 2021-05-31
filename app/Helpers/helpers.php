<?php

use App\Models\Payroll;
use Illuminate\Support\Facades\Mail;


// if (! function_exists('sendEmail')) {
//     function sendEmail($email){

//     }
// }


if (! function_exists('thisMonthsPayroll')) {
    function thisMonthsPayroll($user_id){
        $payStatus = Payroll::select('status')->where([
            'user_id' => $user_id,
            'month'   => now()->month
            ])->first();

        return $payStatus['status'];
    }
}

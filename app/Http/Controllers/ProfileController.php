<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller{

    public function update(Request $request, $id){
      //  dd($request->all());
        $password =  User::where('id',$id)->pluck('password');
        // dd($password[0]);
            User::where('id',$id)->update([
                "otherNames" =>  $request['otherNames'],
                "altPhoneNumber" => $request['altPhoneNumber'],
                "emergencyPhoneNumber" => $request['emergency_contact'],
                "current_address" =>  $request['present_residence'],
                "permanent_address" => $request['permanent_residence'],
                "home_county" => $request['home_county'],
                "spouse_fname" => $request['spouse_fname'],
                "spouse_lname" => $request['spouse_lname'],
                "spouse_otherNames" => $request['spouse_otherNames'],
                "spouse_phoneNumber" => $request['spouse_phoneNumber'],
                "spouse_altphoneNumber" => $request['spouse_altphoneNumber'],
                "spouse_nationalId" => $request['spouse_nationalId'],
                'password' => $request['newPassword'] ? Hash::make($request['newPassword']) :    $password[0],
            ]);

        return redirect()->route('employees.show', $id)->with('message','Profile updated successfully!');
    }

}

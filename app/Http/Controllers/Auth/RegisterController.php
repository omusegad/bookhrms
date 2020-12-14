<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data){
        return Validator::make($data, [
            // 'name' => ['required', 'string', 'max:255'],
            // 'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            // 'password' => ['required', 'string', 'min:6', 'confirmed'],
            // "fName" =>  ['required', 'string', 'max:255'],
            // "lName" =>  ['required', 'string', 'max:255'],
            // "otherNames" =>  [ 'string', 'max:255'],
            // "phoneNumber" => ['required', 'digits:10'],
            // "altPhoneNumber" => ['required', 'digits:10'],
            // "emergencyPhoneNumber" => ['required', 'digits:10'],
            // "nhifNo" => ['required', 'numeric'],
            // "nssfNo" => ['required', 'numeric'],
            // "nationalID" => ['required', 'numeric'],
            // "present_residence" =>  ['required', 'string', 'max:255'],
            // "permanent_residence" => ['required', 'string', 'max:255'],
            // "home_county" =>  ['required', 'string', 'max:255'],
            // "employeeID" =>  ['required', 'numeric'],
            // "joining_position" =>  ['required', 'string', 'max:255'],
            // "date_of_birth" => ["date"],
            // "jobgroupid" => ['required'],
            // "gender" =>  ['required'],
            // "marital_status" =>  ['required'],
            // "joining_date" =>["date"],
            // "spouse_fname" =>  ['required', 'string', 'max:255'],
            // "spouse_lname" =>  ['required', 'string', 'max:255'],
            // "spouse_otherNames" => ['required', 'string', 'max:255'],
            // "spouse_phoneNumber" => ['required', 'digits:10'],
            // "spouse_altphoneNumber" => ['required', 'digits:10'],
            // "spouse_nationalId" => ['required','numeric'],
            // "next_of_kin_fname" =>  ['required', 'string', 'max:255'],
            // "next_of_kin_lname" =>  ['required', 'string', 'max:255'],
            // "next_of_kin_otherNames"  =>  ['required', 'string', 'max:255'],
            // "next_of_kin_phoneNumber" =>['required', 'digits:10'],
            // "next_of_kin_altPhoneNumber" => ['required', 'digits:10'],
            // "next_of_kin_nationId" => ['required', 'numeric']
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data){
       // dd($data);
        return User::create([
            "fname" =>  $data['fname'],
            "lName" =>  $data['lName'],
            "otherNames" =>  $data['otherNames'],
            'email' => $data['email'],
            "phoneNumber" => $data['phoneNumber'],
            "altPhoneNumber" => $data['altPhoneNumber'],
            "emergencyPhoneNumber" => $data['emergencyPhoneNumber'],
            "nhifNo" =>  $data['nhifNo'],
            "nssfNo" => $data['nssfNo'],
            "created_by" => 1, //Auth::user()->id,
            "nationalID" => $data['nationalID'],
            "current_address" => $data['present_residence'],
            "permanent_residence" => $data['permanent_residence'],
            "home_county" => $data['home_county'],
            "employeeID" =>  $data['employeeID'],
            "joining_position" => $data['joining_position'],
            "date_of_birth" =>$data['date_of_birth'],
            "aic_jobgroups_id" => $data['jobgroupid'],
            "gender" =>  $data['gender'],
            "marital_status" =>  $data['marital_status'],
            "joining_date" => $data['joining_date'],
            "spouse_fname" => $data['spouse_fname'],
            "spouse_lname" => $data['spouse_lname'],
            "spouse_otherNames" => $data['spouse_otherNames'],
            "spouse_phoneNumber" => $data['spouse_phoneNumber'],
            "spouse_altphoneNumber" => $data['spouse_altphoneNumber'],
            "spouse_nationalId" => $data['spouse_nationalId'],
            "next_of_kin_fname" =>  $data['next_of_kin_fname'],
            "next_of_kin_lname" => $data['next_of_kin_lname'],
            "next_of_kin_otherNames"  =>  $data['next_of_kin_otherNames'], 
            "next_of_kin_phoneNumber" => $data['next_of_kin_phoneNumber'],
            "next_of_kin_altPhoneNumber" => $data['next_of_kin_altPhoneNumber'],
            "next_of_kin_nationId" => $data['next_of_kin_nationId'],
            "employee_status" => $data['employee_status'],
            'password' => Hash::make($data['password']),
        ]);
    }
}

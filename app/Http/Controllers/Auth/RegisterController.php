<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

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
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data){
       // dd($data);
        return Validator::make($data, [
            "fName"             => ['required', 'string', 'max:255'],
            "lName"             => ['required', 'string', 'max:255'],
            "otherNames"        => ['string', 'max:255'],
            "employeeID"        => ['string', 'max:255'],
            'email'             => ['required', 'string', 'email', 'max:255', 'unique:users'],
            "phoneNumber"       => ['required','numeric','regex:/^([0-9\s\-\+\(\)]*)$/','min:10'],
            "altPhoneNumber"    => ['regex:/^([0-9\s\-\+\(\)]*)$/','min:10'],
            "emergency_contact" => ['required','numeric','regex:/^([0-9\s\-\+\(\)]*)$/','min:10'],
            "nhifNo"            => ['required', 'string', 'max:255'],
            "nssfNo"            => ['required', 'string', 'max:255'],
            "nationalID"        => ['required','numeric','digits:10'],
            "aic_jobgroups_id"  => ['required'],
            "present_residence" => ['required', 'string', 'max:255'],
            "permanent_residence" => ['required', 'string', 'max:255'],
            "home_county"         => ['required', 'string', 'max:255'],
            "joining_position"    => ['required', 'string', 'max:255'],
            "date_of_birth"       => ['required', 'date'],
            "joining_date"        => ['required', 'date'],
            "spouse_fname"        => ['string', 'max:255'],
            "spouse_lname"        => ['string', 'max:255'],
            "spouse_otherNames"   => ['string', 'max:255'],
            "spouse_phoneNumber"    => ['regex:/^([0-9\s\-\+\(\)]*)$/','min:10'],
            "spouse_altphoneNumber" => ['regex:/^([0-9\s\-\+\(\)]*)$/','min:10'],
            "spouse_nationalId"     => ['digits:10'],
            "next_of_kin_fname"     => ['required', 'string', 'max:255'],
            "next_of_kin_lname"     => ['required', 'string', 'max:255'],
            "next_of_kin_otherNames"     => ['string', 'max:255'],
            "next_of_kin_phoneNumber"    => ['required','numeric','regex:/^([0-9\s\-\+\(\)]*)$/','min:10'],
            "next_of_kin_altPhoneNumber" => ['regex:/^([0-9\s\-\+\(\)]*)$/','min:10'],
            "next_of_kin_nationId"       => ['required','digits:10'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
     
       
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data){
        return User::create([
            'fName' => $data['fName'],
            'lName' => $data['lName'],
            'email' => $data['email'],
            'otherNames' => $data['otherNames'],
            'employeeID' => $data['employeeID'],
            'phoneNumber' => $data['phoneNumber'],
            'altPhoneNumber' => $data['altPhoneNumber'],
            'emergency_contact' => $data['emergency_contact'],
            'nhifNo' => $data['nhifNo'],
            'nssfNo' => $data['nssfNo'],
            'nationalID' => $data['nationalID'],
            'aic_jobgroups_id' => 1,
            'present_residence' => $data['present_residence'],
            'permanent_residence' => $data['permanent_residence'],
            'home_county' => $data['home_county'],
            'joining_position' => $data['joining_position'],
            'date_of_birth' => $data['date_of_birth'],
            'joining_date' => $data['joining_date'],
            'spouse_fname' => $data['spouse_fname'],
            'spouse_lname' => $data['spouse_lname'],
            'spouse_otherNames' => $data['spouse_otherNames'],
            'spouse_phoneNumber' => $data['spouse_phoneNumber'],
            'spouse_nationalId' => $data['spouse_nationalId'],
            'next_of_kin_fname' => $data['next_of_kin_fname'],
            'next_of_kin_lname' => $data['next_of_kin_lname'],
            'next_of_kin_otherNames' => $data['next_of_kin_otherNames'],
            'next_of_kin_phoneNumber' => $data['next_of_kin_phoneNumber'],
            'next_of_kin_altPhoneNumber' => $data['next_of_kin_altPhoneNumber'],
            'next_of_kin_nationId' => $data['next_of_kin_nationId'],
            'password' => Hash::make($data['password']),
        ]);
    }
 


}




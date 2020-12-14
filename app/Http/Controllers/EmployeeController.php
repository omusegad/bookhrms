<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $users = User::all();
        //dd($users);
        return view('employees.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('employees.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        $data = $request->validate([
            "fname" =>  ['required', 'string', 'max:255'],
            "lName" =>  ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
            "otherNames" =>  [ 'string', 'max:255'],
            "phoneNumber" => ['required', 'digits:10'],
            "altPhoneNumber" => ['required', 'digits:10'],
            "emergencyPhoneNumber" => ['required', 'digits:10'],
            "nhifNo" => ['required', 'numeric'],
            "nssfNo" => ['required', 'numeric'],
            "nationalID" => ['required', 'numeric'],
            "present_residence" =>  ['required', 'string', 'max:255'],
            "permanent_residence" => ['required', 'string', 'max:255'],
            "home_county" =>  ['required', 'string', 'max:255'],
            "employeeID" =>  ['required', 'numeric'],
            "joining_position" =>  ['required', 'string', 'max:255'],
            "date_of_birth" => ["date"],
            "jobgroupid" => ['required'],
            "gender" =>  ['required'],
            "marital_status" =>  ['required'],
            "marital_status" =>  ['required', 'string', 'max:255'],
            "joining_date" =>["date"],
            "spouse_fname" =>  ['required', 'string', 'max:255'],
            "spouse_lname" =>  ['required', 'string', 'max:255'],
            "spouse_otherNames" => ['required', 'string', 'max:255'],
            "spouse_phoneNumber" => ['required', 'digits:10'],
            "spouse_altphoneNumber" => ['required', 'digits:10'],
            "spouse_nationalId" => ['required','numeric'],
            "next_of_kin_fname" =>  ['required', 'string', 'max:255'],
            "next_of_kin_lname" =>  ['required', 'string', 'max:255'],
            "next_of_kin_otherNames"  =>  ['required', 'string', 'max:255'],
            "next_of_kin_phoneNumber" =>['required', 'digits:10'],
            "next_of_kin_altPhoneNumber" => ['required', 'digits:10'],
            "next_of_kin_nationId" => ['required', 'numeric']
        ]);

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
            "created_by" => Auth::user()->id,
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
            "employee_status" => $data['employee_status'],
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
            'password' => Hash::make($data['password']),
        ]);
        return back()->with('message','Region has been created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $employee = User::where('id',$id)->first();
        return view('employees.show', compact('employee'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id){
        $employee = User::findOrFail($id);
        return view('employees.edit', compact('employee'));
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

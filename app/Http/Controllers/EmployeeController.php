<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Jobgroup;
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
        return view('employees.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $jobgroup = Jobgroup::all();
        return view('employees.create', compact('jobgroup'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        // $data = $request->validate([
        //     "fname" =>  ['required', 'string', 'max:255'],
        //     "lName" =>  ['required', 'string', 'max:255'],
        //     'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        //     "employeeID" =>  ['required', 'numeric'],
        //     "joining_position" =>  ['required', 'string', 'max:255'],
        //     "jobgroupid" => ['required'],
        //     "gender" =>  ['required'],
        //     "joining_date" =>["date"],
        //     'password' => ['required', 'string', 'min:6', 'confirmed'],

        // ]);

        $data = $request->all();
       // dd($data);

        User::create([
            "fname" =>  $data['fname'],
            "lName" =>  $data['lName'],
            'email' => $data['email'],
            "created_by" => Auth::user()->id,
            "employeeID" =>  $data['employeeID'],
            "aic_jobgroups_id" => $data['jobgroupid'],
            "gender" =>  $data['gender'],
            "joining_date" => $data['joining_date'],
            'password' => Hash::make(strtolower($data['password'])),
        ]);
        return back()->with('message','Employee Added successfully!');
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

        // "fname" =>  ['required', 'string', 'max:255'],
        // "lName" =>  ['required', 'string', 'max:255'],
        // 'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        // 'password' => ['required', 'string', 'min:6', 'confirmed'],
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
        // "marital_status" =>  ['required', 'string', 'max:255'],
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

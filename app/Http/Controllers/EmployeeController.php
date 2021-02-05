<?php

namespace App\Http\Controllers;

use Rap2hpoutre\FastExcel\FastExcel;
use App\Models\User;
use App\Models\Region;
use App\Models\Jobgroup;
use App\Models\Dccregions;
use App\Models\Lccregions;
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


        $users = User::with('region','dcc','lcc','jobgroup')->get();
       // dd($users);
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
        $regions  = Region::all();
        $dcc      = Dccregions::all();
        $lcc      = Lccregions::all();
        return view('employees.create', compact('regions','jobgroup','dcc','lcc'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        // $request = $this->validate([
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


      //  bulk uploads codes
        // $request = request('employeeUpload');
        // $employees = (new FastExcel)->import($request);

        // foreach($employees as $alphabet => $collection) {
        //   //  dd($collection);


        //     User::create([
        //         'fname'      =>  $collection["FirstName"],
        //         'lName'      =>  $collection["Surname"],
        //         'aic_jobgroups_id' => 1,
        //         'aic_regions_id'   => 1,
        //         'aic_dccs_id'      => 1,
        //         'aic_lccs_id'      => 1,
        //         'education'     =>  "x",
        //         'email'         =>   str_replace(' ', '', strtolower($collection["FirstName"].".".$collection["Surname"]."@aicnandi.org")),
        //         "employeeID"    =>  $collection["Employee_no"],
        //         "employee_type" => "HQ",
        //         'password'   =>   Hash::make(strtolower($collection["FirstName"]."#". $collection["Employee_no"])),
        //        ]);
        // }

       $request = $request->all();

        User::create([
            "fname" =>  $request['fname'],
            "lName" =>  $request['lName'],
            'email' =>  $request['email'],
            "created_by" => Auth::user()->id,
            "employeeID" =>  $request['employeeID'],
            "aic_jobgroups_id" => $request['aic_jobgroups_id'],
            "aic_regions_id" => $request['aic_regions_id'],
            "aic_dccs_id" => $request['aic_dccs_id'],
            "aic_lccs_id" => $request['aic_lccs_id'],
            "gender" =>  $request['gender'],
            "joining_date" => $request['joining_date'],
            'password' => Hash::make(strtolower("password"."123")),
        ]);
        return back()->with('message','Employee Added successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id){
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
        $employee = User::where('id',$id)->first();
        $jgroup   = Jobgroup::all();
        $regions  = Region::all();
        $dcc      = Dccregions::all();
        $lcc      = Lccregions::all();

        return view('employees.edit', compact('lcc','dcc','regions','employee', 'jgroup'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id){
       $edited = User::where('id',$id)->update([
            "employeeID" =>  $request['employeeID'],
            "fname" =>  $request['fname'],
            "lName" =>  $request['lName'],
            "otherNames" =>  $request['otherNames'],
            "education" =>  $request['education'],
            'email' => $request['email'],
            "created_by" => Auth::user()->id,
            "nationalID" => $request['nationalID'],
            "father_name" => $request['father_name'],
            "mother_name" => $request['mother_name'],
            "date_of_birth" =>$request['date_of_birth'],
            "probation_period" =>$request['probation_period'],
            "phoneNumber" => $request['phoneNumber'],
            "altPhoneNumber" => $request['altPhoneNumber'],
            "emergencyPhoneNumber" => $request['emergencyPhoneNumber'],
            "experience" =>  $request['experience'],
            "nhifNo" =>  $request['nhifNo'],
            "nssfNo" => $request['nssfNo'],
            "gender" =>  $request['gender'],
            "marital_status" =>  $request['marital_status'],
            "joining_date" => $request['joining_date'],
            "confirmation_date" => $request['confirmation_date'],
            "department" => $request['department'],
            "current_address" => $request['present_residence'],
            "permanent_address" => $request['permanent_address'],
            "aic_regions_id" => $request['aic_regions_id'],
            "aic_jobgroups_id" => $request['aic_jobgroups_id'],
            "aic_lccs_id" => $request['aic_lccs_id'],
            "aic_dccs_id" => $request['aic_dccs_id'],
            "joining_position" => $request['joining_position'],
            "spouse_fname" => $request['spouse_fname'],
            "spouse_lname" => $request['spouse_lname'],
            "spouse_otherNames" => $request['spouse_otherNames'],
            "spouse_phoneNumber" => $request['spouse_phoneNumber'],
            "spouse_altphoneNumber" => $request['spouse_altphoneNumber'],
            "spouse_nationalId" => $request['spouse_nationalId'],
            "next_of_kin_fname" =>  $request['next_of_kin_fname'],
            "next_of_kin_lname" => $request['next_of_kin_lname'],
            "next_of_kin_otherNames"  =>  $request['next_of_kin_otherNames'],
            "next_of_kin_phoneNumber" => $request['next_of_kin_phoneNumber'],
            "next_of_kin_altPhoneNumber" => $request['next_of_kin_altPhoneNumber'],
            "next_of_kin_nationId" => $request['next_of_kin_nationId'],
            "employee_type" => $request['employee_type'],
            "employee_status" => $request['employee_status']
        ]);

        return back()->with('message','Salary updated successfully!');

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

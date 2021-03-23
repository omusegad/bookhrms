<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Region;
use App\Models\Jobgroup;
use App\Models\Dccregions;
use App\Models\Lccregions;
use App\Traits\UploadTrait;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Rap2hpoutre\FastExcel\FastExcel;

class EmployeeController extends Controller{
    use UploadTrait;

    public function index(){
        $users = User::with('region','dcc','lcc','jobgroup')->orderBy('fname')->get();
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
        $employee = User::where('id',$id)->with('region','dcc','lcc','jobgroup')->first();
        return view('employees.show', compact('employee'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id){
        $employee = User::where('id',$id)->with('region','dcc','lcc','jobgroup')->first();
        //dd(  $employee);
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
        // get and save image
       // dd($request->all());
        if ($request->has('profile_image')) {
            $image = $request->file('profile_image');
            $name = Str::slug($request->input('fname')).'_'.time();
            $folder = '/uploads/images/';
            $filePath = $folder . $name. '.' . $image->getClientOriginalExtension() ;
          $this->uploadOne($image, $folder, 'public', $name);
        }

        $password =  User::where('id',$id)->pluck('password'); // get current password
        $avatar      =  User::where('id',$id)->pluck('avatar'); //  get current avatar
    //   dd( $avatar );

        User::where('id',$id)->update([
                        "employeeID" =>  $request['employeeID'],
                        "fname" =>  $request['fname'],
                        "lName" =>  $request['lName'],
                        "otherNames" =>  $request['otherNames'],
                        "education" =>  $request['education'],
                        'email' => $request['email'],
                        "created_by" => Auth::user()->id,
                        "nationalID" => $request['nationalID'],
                        "date_of_birth" =>$request['date_of_birth'],
                        "phoneNumber" => $request['phoneNumber'],
                        "altPhoneNumber" => $request['altPhoneNumber'],
                        "experience" =>  $request['experience'],
                        "nhifNo" =>  $request['nhifNo'],
                        "nssfNo" => $request['nssfNo'],
                        "gender" =>  $request['gender'],
                        "marital_status" =>  $request['marital_status'],
                        "joining_date" => $request['joining_date'],
                        "joining_position" => $request['joining_position'],
                        "secondPosition" => $request['secondPosition'],
                        "department" => $request['department'],
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
                        "employee_status" => $request['employee_status'],
                        "pinNo" => $request['pinNo'],
                        "avatar" => $request['profile_image'] ?  $filePath  :   $avatar [0],
                        "home_county" => $request['home_county'],
                        "postalAddress" => $request['postalAddress'],
                        "otherEmailAddress" => $request['otherEmailAddress'],
                        "next_of_kin_relationship" => $request['next_of_kin_relationship'],
                        "exit_date" => $request['exit_date'],
                        "male_pastors_grade" => $request['male_pastors_grade'],
                        "female_pastors_grade" => $request['female_pastors_grade'],
                        'password' => $request['newPassword'] ? Hash::make($request['newPassword']) :    $password[0],
                    ]);

        //  dd( $edited);

        return back()->with('message','Employee updated successfully!');

    }




}

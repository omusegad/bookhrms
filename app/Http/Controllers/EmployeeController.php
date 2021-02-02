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
        // $data = $this->validate([
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
        // $data = request('employeeUpload');
        // $employees = (new FastExcel)->import($data);

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

       $data = $request->all();

        User::create([
            "fname" =>  $data['fname'],
            "lName" =>  $data['lName'],
            'email' =>  $data['email'],
            "created_by" => Auth::user()->id,
            "employeeID" =>  $data['employeeID'],
            "aic_jobgroups_id" => $data['aic_jobgroups_id'],
            "aic_regions_id" => $data['aic_regions_id'],
            "aic_dccs_id" => $data['aic_dccs_id'],
            "aic_lccs_id" => $data['aic_lccs_id'],
            "gender" =>  $data['gender'],
            "joining_date" => $data['joining_date'],
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
        $employee = User::findOrFail($id)->first();
        $jgroup = Jobgroup::all();
        return view('employees.edit', compact('employee', 'jgroup'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id){
       $user = User::findOrFail($id)->first();
        dd($user);

        User::update([
            'education'           => $data['education'],
            'grade'               => $data['grade'],
            'job_group'           => $data['job_group'],
            'basic_salary'        => $data['basic_salary'],
            'hse_allowance'       => $data['hse_allowance'],
            'transport_allowance' => $data['transport_allowance'],
            'airtime_allowance'   => $data['airtime_allowance'],
            'net_salary'          => $salary_data['netPay'],
            'payee'               => $salary_data['payee'],
            'incomeTax'           => $salary_data['incomeTax'],
            'personalRelief'      => $salary_data['personalRelief'],
            'payAfterTax'         => $salary_data['payAfterTax'],
            'nhif'                => $salary_data['nhif']
        ]);



        User::update([
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
             'bankName' => $data['bankName'],
             'bankBranch' => $data['bankBranch'],
             'accountNumber' => $data['accountNumber'],
        ]);

       //return back();

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

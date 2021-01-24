<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Region;
use App\Models\Salary;
use App\Models\Jobgroup;
use App\Models\Dccregions;
use App\Models\Lccregions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Rap2hpoutre\FastExcel\FastExcel;

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
        $data = request('employeeUpload');
        $employees = (new FastExcel)->import($data);

        //dd( $employees);

        foreach($employees as $alphabet => $collection) {
        //dd($collection);

         $user = User::where('employeeID',$collection['emplno'])->first();
        if($user==null){
            continue;
        }

          Salary::create([
                'emplno'      =>  $collection["emplno"] ?  $collection["emplno"] : 0,
                'user_id'      =>  $user['id'],
                'basic_salary'      =>  $collection["Bsalary"] ?   $collection["Bsalary"] : 0,
                'transport_allowance' =>  $collection["transpt"] ? $collection["transpt"] : 0,
                'hse_allowance'      =>  $collection["Hseallow"] ? $collection["Hseallow"] : 0,
                'airtime_allowance'  =>  $collection["Airtime"] ? $collection["Airtime"] : 0,
                'job_group'      =>  1,
                'bankCode'      =>  00000,
                'reference'      =>  "Salary",
                //'hospitality_allowance'      =>  $collection["hospitality"] ?  $collection["hospitality"] : 0,
                'gross_pay'      =>  $collection["Grosssalary"] ?  $collection["Grosssalary"] : 0,
                'payee'      =>  $collection["PAYE"] ? $collection["PAYE"] : 0,
                'personalRelief'      =>  $collection["Monthlyrelief"] ?  $collection["Monthlyrelief"] : 0,
                'incomeTax'      =>  $collection["incometax"] ?  $collection["incometax"] : 0,
                'nssf'      =>  $collection["NSSF"] ? $collection["NSSF"] : 0,
                'nhif'      =>  $collection["NHIF"] ? $collection["NHIF"] : 0,
                'net_pay' => $collection["NetSalary"] ?  $collection["NetSalary"] : 0 ,
                'bankName' =>$collection["BankName"] ? $collection["BankName"] : 0 ,
                'bankBranch' =>$collection["branch"] ? $collection["branch"] : 0 ,
                'beneficiaryAccountNumber' => $collection["AccountNo"] ?  $collection["AccountNo"] : 0,
               ]);
          
        }

exit;
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
    public function update(Request $request, $id){

        User::findorFail($id);
        $data = $this->validate($request, [
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
            "next_of_kin_nationId" => ['required', 'numeric'],
            'bankName' => ['required'],
            'bankBranch' => ['required'],
            'accountNumber' => ['required']
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
        return back();

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

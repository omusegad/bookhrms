<?php

namespace App\Http\Controllers;

use App\Models\Nhif;
use App\Models\Nssf;
use App\Models\User;
use App\Models\Salary;
use App\Models\Jobgroup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\MonthlyTaxableIncome;

class EmployeeSalaryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = User::all();
        $jobgroup  = Jobgroup::all();
        $salaries  = Salary::with('users')->get();
        $totalBasicSalary  = Salary::sum('basic_salary');
        $totalHseAllowance  = Salary::sum('hse_allowance');
        $totalTransportAllowance  = Salary::sum('transport_allowance');
        $totalAirtimeAllowance  = Salary::sum('airtime_allowance');
        $totalNhifAllowance  = Salary::sum('nhif');
        $totalIncomeTax  = Salary::sum('incomeTax');
        $totalPayee  = Salary::sum('payee');
        $totalNetPay  = Salary::sum('net_salary');

        return view('salaries.index', compact('salaries','totalAirtimeAllowance','totalNetPay','totalPayee','totalIncomeTax','totalNhifAllowance','totalTransportAllowance','totalHseAllowance','totalBasicSalary','employees', 'jobgroup'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){

        $data = $request->all();

        $user_id             = $data['user_id'];
        $basicSalary         = $data['basic_salary'];
        $hse_allowance       = $data['hse_allowance'];
        $transport_allowance = $data['transport_allowance'];
        $airtime             = $data['airtime_allowance'];

        ///Get active nssf band
        $nssf  = Nssf::where('status', 'active')->pluck('amount')->first();

        if($nssf == null){
            return back()->with('message_nssf','Kindly activate NSSF Rate');
        }

        // get total gross salary
        $grossSalary = $this->getGrossSalary($basicSalary,$hse_allowance,$transport_allowance,$airtime);

        // calculate taxable pay 
        $taxablePay = ($grossSalary - $nssf);
        //Get NHIF band and charges
        $nhif = Nhif::select('from_salary','to_salary','monthlyCharges')->get();
      
        // calculate nhif charges based on salary 
        $nhif_charges = $this->calculate_nhif_amount($taxablePay,$nhif);

        //get salary details 
        $salary_data = $this->calculateNetSalaryPay($taxablePay,$nhif_charges);
       // dd( $salary_data );
      
        //Check if salary exists
        $existingSalary = Salary::where('user_id',  $user_id)->first();
        if($existingSalary){

            DB::table('employee_salary')->update([
                'user_id'             => $user_id,
                'education'           => $data['education'],
                'grade'               => $data['grade'],
                'job_group'           => $data['job_group'],
                'basic_salary'        => $basicSalary,
                'current_salary'      => $data['current_salary'],
                'hse_allowance'       => $hse_allowance,
                'transport_allowance' => $transport_allowance,
                'airtime_allowance'   => $airtime,
                'net_salary'          => $salary_data['netPay'],
                'payee'               => $salary_data['payee'],
                'incomeTax'           => $salary_data['incomeTax'],
                'personalRelief'      => $salary_data['personalRelief'],
                'payAfterTax'         => $salary_data['payAfterTax'],
                'nhif'                => $salary_data['nhif']
            ]);

            return back()->with('message','Salary Updated successfully!');
        }else{

            Salary::Create([
                'user_id'        =>  $user_id,
                'education'      => $data['education'],
                'grade'          => $data['grade'],
                'job_group'           => $data['job_group'],
                'basic_salary'        => $basicSalary,
                'current_salary'      => $data['current_salary'],
                'hse_allowance'       => $hse_allowance,
                'transport_allowance' => $transport_allowance,
                'airtime_allowance'   => $airtime,
                'airtime_allowance'   => $airtime,
                'net_salary'          => $salary_data['netPay'],
                'payee'               => $salary_data['payee'],
                'incomeTax'           => $salary_data['incomeTax'],
                'personalRelief'      => $salary_data['personalRelief'],
                'payAfterTax'         => $salary_data['payAfterTax'],
                'nhif'                => $salary_data['nhif']
            ]);
            return back()->with('message','Salary created successfully!');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id){
        $salary   = Salary::findOrFail($id)->first();
        $jobgroup = Jobgroup::all();
        return view('salaries.edit', compact('salary', 'jobgroup'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id){

        $data = Salary::findOrFail($id)->first();

        ///Get active nssf band
        $nssf  = Nssf::where('status', 'active')->pluck('amount')->first();

        if($nssf == null){
            return back()->with('message_nssf','Kindly activate NSSF Rate');
        }

        // get total gross salary
        $grossSalary = $this->getGrossSalary($basicSalary,$hse_allowance,$transport_allowance,$airtime);

        // calculate taxable pay 
        $taxablePay = ($grossSalary - $nssf);

        //Get NHIF band and charges
        $nhif = Nhif::select('from_salary','to_salary','monthlyCharges')->get();

        //calculate nhif charges based on salary 
        $nhif_charges = $this->calculate_nhif_amount($taxablePay,$nhif);

        //get salary details 
        $salary_data = $this->calculateNetSalaryPay($taxablePay,$nhif_charges);

        Salary::update([
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

    private function getGrossSalary($basicSalary,$hse_allowance,$transport_allowance,$airtime){
      return ($basicSalary + $hse_allowance + $transport_allowance + $airtime);
    }

  
    ///24,000 or below ten percent taxable
    public function calculateNetSalaryPay($taxablePay,$nhif_charges){
        //24,000 is taxable at 10%, no personal relief applied 
       $personalReliefAmount = 2400;

       //$payee = $incomeTax - $personalReliefAmount;
       if($taxablePay <= 24000){
          $data = array();
          $incomeTax = ($taxablePay *0.1);
           if($incomeTax <= $personalReliefAmount){
               $payee = 0;
               $payAfterTax = ($taxablePay - $payee);
               $data['payee'] =  $payee;
               $data['incomeTax'] =  $incomeTax;
               $data['personalRelief'] = 0;
               $data['payAfterTax'] =  $payAfterTax;
               $data['nhif'] = $nhif_charges;
               $data['netPay'] = (  $payAfterTax - $nhif_charges );
               return  $data; 
           }
           
       }elseif($taxablePay > 24000 && $taxablePay <= 32333){
           $tenPercent = ( 24000 * 0.1);
           $twentyFivePercent = (8333 * 0.25);
           $totalIncomeTax = ( $tenPercent + $twentyFivePercent );

           $payee = ($totalIncomeTax - $personalReliefAmount);
           $payAfterTax = ($taxablePay - $payee);
           $data['payee'] =  $payee;
           $data['incomeTax'] =  $totalIncomeTax;
           $data['personalRelief'] = $personalReliefAmount;
           $data['payAfterTax'] =  $payAfterTax;
           $data['nhif'] = $nhif_charges;
           $data['netPay'] = (  $payAfterTax - $nhif_charges );
           return  $data; 

       }else{
           if($taxablePay > 32333 ){
            $tenPercent = ( 24000 * 0.1);
            $twentyFivePercent = (8333 * 0.25);
            $thirtyPercent = (($taxablePay - 32333) * 0.3);

            $totalIncomeTax = ( $tenPercent + $twentyFivePercent + $thirtyPercent);
 
            $payee = ($totalIncomeTax - $personalReliefAmount);
            $payAfterTax = ($taxablePay - $payee);
            $data['payee'] =  $payee;
            $data['incomeTax'] =  $totalIncomeTax;
            $data['personalRelief'] = $personalReliefAmount;
            $data['payAfterTax'] =  $payAfterTax;
            $data['nhif'] = $nhif_charges;
            $data['netPay'] = (  $payAfterTax - $nhif_charges);
            return  $data; 
           }
       }

    }


    //calculate nhif amount based on salary
    private function calculate_nhif_amount($taxablePay,$nhif){
        $initialScope = 5999;
        switch($taxablePay) {
            case (($taxablePay >= $initialScope ) && ($taxablePay < $nhif[0]->from_salary)):
                return  150;
             break;
            case ($taxablePay >=  $nhif[0]->from_salary) && ($taxablePay <= $nhif[0]->to_salary):
             return  $nhif[0]->monthlyCharges;
              break;
              case ($taxablePay >=   $nhif[1]->from_salary) && ($taxablePay <= $nhif[1]->to_salary):
                return  $nhif[1]->monthlyCharges;
              break;
            case ($taxablePay >= $nhif[3]->from_salary) && ($taxablePay <= $nhif[3]->to_salary):
                return  $nhif[3]->monthlyCharges;
              break;
              case ($taxablePay >= $nhif[4]->from_salary) && ($taxablePay <= $nhif[4]->to_salary):
                return  $nhif[4]->monthlyCharges;
              break;
              case ($taxablePay >= $nhif[5]->from_salary) && ($taxablePay <= $nhif[5]->to_salary):
                return  $nhif[5]->monthlyCharges;
              break;
              case ($taxablePay >= $nhif[6]->from_salary) && ($taxablePay <= $nhif[6]->to_salary):
                return  $nhif[6]->monthlyCharges;
              break;
              case ($taxablePay >= $nhif[7]->from_salary) && ($taxablePay <= $nhif[7]->to_salary):
                return  $nhif[7]->monthlyCharges;
              break;
              case ($taxablePay >= $nhif[8]->from_salary) && ($taxablePay <= $nhif[8]->to_salary):
                return  $nhif[8]->monthlyCharges;
              break;
              case ($taxablePay >= $nhif[9]->from_salary) && ($taxablePay <= $nhif[9]->to_salary):
                return  $nhif[9]->monthlyCharges;
              break;
              case ($taxablePay >= $nhif[10]->from_salary) && ($taxablePay <= $nhif[10]->to_salary):
                return  $nhif[10]->monthlyCharges;
              break;
              case ($taxablePay >= $nhif[11]->from_salary) && ($taxablePay <= $nhif[11]->to_salary):
                return  $nhif[11]->monthlyCharges;
              break;
              case ($taxablePay >= $nhif[12]->from_salary) && ($taxablePay <= $nhif[12]->to_salary):
                return  $nhif[12]->monthlyCharges;
              break;
              case ($taxablePay >= $nhif[13]->from_salary) && ($taxablePay <= $nhif[13]->to_salary):
                return  $nhif[13]->monthlyCharges;
              break;
              case ($taxablePay >= $nhif[14]->from_salary) && ($taxablePay <= $nhif[14]->to_salary):
                return  $nhif[14]->monthlyCharges;
              break;
              case ($taxablePay >= 100000):
                return 1700;
              break;
            default:
              return 0;
        }

    }



}

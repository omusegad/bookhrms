<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;

use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class FieldSalaryExport implements FromCollection, WithHeadings, WithMapping{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection(){
        return  User::where('employee_type','FIELD')->with('salary')->get();
    }

    public function map($row): array{
             return [
                 $row->employeeID,
                 $row->fname. '  '.   $row->lName,
                 !empty($row->salary['bankName']) ? $row->salary['bankName'] : " ",
                 !empty( $row->salary['bankBranch']) ?  $row->salary['bankBranch'] : "",
                 !empty( $row->salary['bankCode']) ? $row->salary['bankCode'] : " ",
                 !empty($row->salary['beneficiaryAccountNumber']) ? $row->salary['beneficiaryAccountNumber'] : "",
                 !empty($row->salary['basic_salary']) ? $row->salary['basic_salary'] : "",
                 !empty($row->salary['transport_allowance']) ?$row->salary['transport_allowance'] : " ",
                 !empty($row->salary['hse_allowance']) ? $row->salary['hse_allowance'] : " ",
                 !empty($row->salary['airtime_allowance']) ? $row->salary['airtime_allowance'] : "",
                 !empty($row->salary['hospitality_allowance']) ? $row->salary['hospitality_allowance'] : "",
                 !empty($row->salary['gross_pay']) ? $row->salary['gross_pay'] : " ",
                 !empty($row->salary['payee']) ? $row->salary['payee'] : "",
                 !empty($row->salary['personalRelief']) ? $row->salary['personalRelief'] : "",
                 !empty($row->salary['incomeTax']) ? $row->salary['incomeTax'] : "",
                 !empty($row->salary['nssf']) ? $row->salary['nssf'] :"",
                 !empty($row->salary['nhif']) ? $row->salary['nhif'] : "",
                 !empty($row->salary['net_pay']) ? $row->salary['net_pay'] : "",
                 !empty( $row->salary['reference']) ? $row->salary['reference'] : " ",
                 !empty( $row->salary['approval_status']) ? $row->salary['approval_status'] : "",
                 !empty( $row->salary['status']) ?  $row->salary['status'] : " "

                ];
}

    public function headings(): array{
        return [
         " Employee ID",
         "Employee Name",
         " Bank Name",
          "Bank Branch",
         " Bank Code",
         " Beneficiary Account Number",
         " Basic Pay ",
          "Transport Allowance",
          "House Allowance",
          "Airtime",
          "Hospitality Allowance",
         " Gross Pay ",
         " P.A.Y.E ",
         " Personal Relief ",
          "Income Tax ",
          "NSSF",
          "NHIF",
          "Net Pay",
          "Reference",
          "Approval Status",
          "Status"
        ];

    }





}

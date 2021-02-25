<?php

namespace App\Exports;

use App\Models\Salary;
use Maatwebsite\Excel\Concerns\FromCollection;

use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class SalaryExport implements FromCollection, WithHeadings, WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection(){
        return Salary::with('users')->get();
    }

    public function map($row): array{
             return [
                 $row->users['employeeID'],
                 $row->users['fname']. '  '.   $row->users['lName'],
                 $row->bankName,
                 $row->bankBranch,
                 $row->bankCode,
                 $row->beneficiaryAccountNumber,
                 $row->basic_salary,
                 $row->transport_allowance,
                 $row->hse_allowance,
                 $row->airtime_allowance,
                 $row->hospitality_allowance,
                 $row->gross_pay,
                 $row->payee,
                 $row->personalRelief,
                 $row->incomeTax,
                 $row->nssf,
                 $row->nhif,
                 $row->net_pay,
                 $row->reference
                ];
}

    public function headings(): array{
        return [
        "Employee ID",
         "Employee Name",
         "Bank Name",
         "Bank Branch",
          "Bank Code",
          "Account Number",
          "Basic Pay",
          "Transport Allowance",
          "House Allowance",
          "Airtime",
          "Hospitality",
          "Gross Pay",
          "PAYE",
          "Personal Relief",
          "Income Tax",
          "NSSF",
          "NHIF",
          "Net Pay",
          "Reference"
        ];

    }




}

<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;

use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class HqPayrollExport implements FromCollection, WithHeadings, WithMapping{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection(){
        return  User::where('employee_type','HQ')->with("payroll")->get();
    }

    public function map($row): array{
             return [
                 $row->id,
                 $row->fname. '  '.   $row->lName,
                 !empty($row->payroll['bankName']),
                 !empty( $row->payroll['bankBranch']),
                 !empty( $row->payroll['bankCode']),
                 !empty($row->payroll['beneficiaryAccountNumber']),
                 !empty($row->payroll['net_pay']),
                 !empty( $row->reference)
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
          "Net Pay",
          "Reference"
        ];

    }




}

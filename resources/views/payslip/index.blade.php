<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Payslip</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<style>
    .title .border-line{
        width: 100%;
        height: 1px;
        background: #000;
    }
    .table th, .table td{
        padding: 5px 30px;
    }
    .column{
        display: flex;
        width: 100%;
        justify-content: space-around;
    }
</style>
<body>
    <div class="container" style="margin-top: 30px">
        <div class="title text-center">
            <div class="payslilogo">
                    <img  src="{{ asset('storage/uploads/images/nandi-logo.jpg') }}"  width="600" height="160"/>
                </div>
                <hr>
               <h5>Payslip for month of   {{ date("F",strtotime($payslip->year)) }}  , {{ now()->year }}</h5>
        </div>
        <div>
            <table class="table table-bordered">
                <tbody>
                    <tr>
                        <th>Name</th>
                        <td style="text-align: right">
                            {{ $payslip->user['fname']  ? $payslip->user['fname']  : " "}}
                            {{ $payslip->user['lName']  ? $payslip->user['lName']  :" " }}
                        </td>
                    </tr>
                    <tr>
                        <th>Position</th>
                        <td style="text-align: right">{{ $payslip->user['joining_position'] ? $payslip->user['joining_position']  : " " }}</td>
                    </tr>

                    <tr>
                        <th>Job Group</th>
                        <td style="text-align: right">{{ $payslip->jobgroup['jonGroupName'] ? $payslip->jobgroup['jonGroupName'] : " "}}</td>
                    </tr>

                    <tr>
                        <th>Basic Pay</th>
                        <td style="text-align: right">KES {{ $payslip->basic_salary ? number_format($payslip->basic_salary) : '0' }}</td>
                    </tr>
                    <tr>
                        <th>Gross Pay</th>
                        <td style="text-align: right">KES {{ $payslip->gross_pay  ? number_format($payslip->gross_pay) : '0'}}</td>
                    </tr>
                    <tr>
                        <th>NSSF</th>
                        <td style="text-align: right">KES {{ $payslip->nssf  ? number_format($payslip->nssf) : '0'}}</td>
                    </tr>
                    <tr>
                        <th>Income Tax</th>
                        <td style="text-align: right">KES {{ $payslip->incomeTax  ? number_format($payslip->incomeTax) : '0'}}</td>
                    </tr>
                    <tr>
                        <th>Personal Relief</th>
                        <td style="text-align: right">KES {{ $payslip->personalRelief  ? number_format($payslip->personalRelief ): '0'}}</td>
                    </tr>
                    <tr>
                        <th>Taxabale Salary</th>
                        <td style="text-align: right">KES {{ number_format($payslip->gross_pay - ($payslip->nssf - $payslip->personalRelief)) }}</td>
                    </tr>
                    <tr>
                        <th>Deductions</th>
                        <td style="text-align: right"></td>
                    </tr>
                    <tr>
                        <th>PAYE</th>
                        <td style="text-align: right">KES {{ $payslip->payee  ? number_format($payslip->payee) : '0'}}</td>
                    </tr>
                    <tr>
                        <th>NHIF</th>
                        <td style="text-align: right">KES {{ $payslip->nhif  ? number_format($payslip->nhif ): '0'}}</td>
                    </tr>
                    <tr>
                        <th>Others Deductions</th>
                        <td style="text-align: right">KES {{ $payslip->otherDeductions  ? number_format($payslip->otherDeductions ): '0'}}</td>
                    </tr>
                    <tr>
                        <th>Net Salary</th>
                        <td style="text-align: right">KES {{ $payslip->net_pay  ? number_format($payslip->net_pay) : '0'}}</td>
                    </tr>
                </tbody>
                <tfoot>
                    <tr>
                        <th>Payment Mode:  Bank: </th>
                        <td style="text-align: right">
                            {{ $payslip->bankName ? $payslip->bankName : ''  }}
                          </td>
                         </tr>
                         <tr>
                            <th> Bank Branch: </th>
                            <td style="text-align: right">
                                 {{ $payslip->bankBranch ?$payslip->bankBranch : ' ' }}
                            </td>
                        </tr>
                             <tr>
                                <th>Beneficiary Account: </th>
                                <td style="text-align: right">
                                    {{ $payslip->beneficiaryAccountNumber ? $payslip->beneficiaryAccountNumber : ' '  }}
                                </td>
                                 </tr>
                </tfoot>
            </table>

        </div>
    </div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>

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
    <div class="container" style="margin-top: 60px">
        <div class="title text-center">
               <h2>AIC NANDI AREA</h2>
               <div class="border-line"></div>
               <h5>Payslip for month of January, 2021</h5>
        </div>
        <div>
            <table class="table table-condensed table-striped">
                <tbody>
                    <tr>
                        <th>Name</th>
                        <td style="text-align: right">{{ $payslip->fname ? $payslip->fname : 'John' }} {{ $payslip->lName ? $payslip->lName : 'Doe' }}</td>
                    </tr>
                    <tr>
                        <th>Department</th>
                        <td style="text-align: right">{{ $payslip->department ? $payslip->department : 'Religion' }}</td>
                    </tr>
                    <tr>
                        <th>Position</th>
                        <td style="text-align: right">{{ $payslip->department ? $payslip->department : 'Pastor' }}</td>
                    </tr>
                    <tr>
                        <th>Region</th>
                        <td style="text-align: right">{{ $payslip->rName ? $payslip->rName : 'Nandi North' }}</td>
                    </tr>
                    <tr>
                        <th>DCC</th>
                        <td style="text-align: right">{{ $payslip->dccName ? $payslip->dccName : 'Cheptuiyet' }}</td>
                    </tr>
                    <tr>
                        <th>LCC</th>
                        <td style="text-align: right">{{ $payslip->lccName ? $payslip->lccName : 'Cheptuiyet/Pri & Sec' }}</td>
                    </tr>
                    <tr>
                        <th></th>
                        <td style="text-align: right">KES</td>
                    </tr>
                    <tr>
                        <th>Basic Pay</th>
                        <td style="text-align: right">{{ $payslip->basic_salary ? $payslip->basic_salary : '0' }}</td>
                    </tr>
                    <tr>
                        <th>Gross Pay</th>
                        <td style="text-align: right">{{ $payslip->gross_pay  ? $payslip->gross_pay : '0'}}</td>
                    </tr>
                    <tr>
                        <th>Deductions Before Tax</th>
                        <td style="text-align: right"></td>
                    </tr>
                    <tr>
                        <th>NSSF</th>
                        <td style="text-align: right">{{ $payslip->nssf  ? $payslip->nssf : '0'}}</td>
                    </tr>
                    <tr>
                        <th>Total Deductions Before Tax</th>
                        <td style="text-align: right">{{ $payslip->nssf  ? $payslip->nssf : '0'}}</td>
                    </tr>
                    <tr>
                        <th>Personal Relief</th>
                        <td style="text-align: right">{{ $payslip->personalRelief  ? $payslip->personalRelief : '0'}}</td>
                    </tr>
                    <tr>
                        <th>Taxabale Salary</th>
                        <td style="text-align: right">{{ $payslip->gross_pay - ($payslip->nssf - $payslip->personalRelief) }}</td>
                    </tr>
                    <tr>
                        <th>Deductions</th>
                        <td style="text-align: right"></td>
                    </tr>
                    <tr>
                        <th>PAYE</th>
                        <td style="text-align: right">{{ $payslip->payee  ? $payslip->payee : '0'}}</td>
                    </tr>
                    <tr>
                        <th>NHIF</th>
                        <td style="text-align: right">{{ $payslip->nhif  ? $payslip->nhif : '0'}}</td>
                    </tr>
                    <tr>
                        <th>Others (e.g Loans)</th>
                        <td style="text-align: right">{{ $payslip->others  ? $payslip->others : '0'}}</td>
                    </tr>
                    <tr>
                        <th>Net Salary</th>
                        <td style="text-align: right">{{ $payslip->net_pay  ? $payslip->net_pay : '0'}}</td>
                    </tr>
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="2"><p><i>Payment Mode:  Bank: {{ $payslip->bankName ? $payslip->bankName : 'Kapsabet'  }}  Branch: {{ $payslip->bankBranch ?$payslip->bankBranch : 'Kapsabet' }}   Acc No. {{ $payslip->beneficiaryAccountNumber ? $payslip->beneficiaryAccountNumber : '0'  }}</i></p></td>
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
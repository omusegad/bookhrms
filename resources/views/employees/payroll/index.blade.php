@extends('layouts.app')

@section('content')

	<!-- Page Wrapper -->
    <div class="page-wrapper">

        <!-- Page Content -->
        <div class="content container-fluid">

            <!-- Page Header -->
            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="page-title" >{{Auth::user()->fname }} {{Auth::user()->lName }} Payroll</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ route('dashboard') }}">Dashboard</a>
                            </li>
                            <li class="breadcrumb-item active">Payroll : (Ksh)</li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /Page Header -->

            <div class="row">
              <div class="col-md-12">
                @if ($message = Session::get('message'))
                    <div class="alert alert-danger alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong>{{ $message }}</strong>
                    </div>
                @endif
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table id="payslips" class="table table-striped custom-table table-bordered" id="payrollD">
                            <thead>
                                <tr>
                                    <th>Staff No</th>
                                    <th>Employee Name</th>
                                    <th>Position</th>
                                    <th>Job Group</th>
                                    <th>Basic Pay</th>
                                    <th>Gross Pay</th>
                                    <th>N.H.I.F</th>
                                    <th>N.S.S.F</th>
                                    <th>Taxable Income</th>
                                    <th>Payee</th>
                                    <th>Monthly Relief</th>
                                    <th>Other Deductions</th>
                                    <th>Net Pay</th>
                                    <th>Month</th>
                                    <th>Year</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                @php($count =1)
                                @foreach ($mypayroll as $item)
                                <tr>
                                    <td> {{$count++ }}</td>
                                        <td>
                                                {{$item->user['fname'] }} {{$item->user['lName'] }}
                                        </td>
                                        <td> {{$item->user['joining_position'] }}</td>
                                        <td> {{$item->jobgroup['jonGroupName'] }}</td>
                                        <td>
                                            {{ number_format($item->basic_salary) }}
                                     </td>
                                     <td>
                                        {{ number_format($item->gross_pay)}}
                                    </td>
                                        <td>
                                            {{ number_format($item->nhif )}}
                                        </td>

                                    <td>
                                        {{ number_format( $item->nssf)}}
                                 </td>
                                 <td>
                                    {{number_format($item->incomeTax)}}
                                </td>
                                <td>
                                    {{number_format($item->payee)}}
                                </td>

                               <td>   {{number_format($item->personalRelief)}} </td>
                               <td>   {{number_format($item->otherDeductions)}} </td>
                                <td>
                                    {{number_format($item->net_pay)}}
                                </td>
                                <td>
                                    {{ DateTime::createFromFormat('!m', $item->month)->format('F')}}
                                </td>
                                <td>
                                    {{ $item->year}}
                                </td>
                                <td>
                                <a href="{{ route('payslip.show',$item->user["id"]) }}">
                                    <i class="fa 2x fa-download"></i>
                                </a>

                                </td>

                                </tr>
                              @endforeach

                            </tbody>
                        </table>
                    </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Page Content -->


    </div>
    <!-- /Page Wrapper -->
@endsection

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
                        <h3 class="page-title">Employee Payroll</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ route('dashboard') }}">Dashboard</a>
                            </li>
                            <li class="breadcrumb-item active">Payroll</li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /Page Header -->

            <div class="row">
                    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                        <div class="card dash-widget">
                            <div class="card-body">
                            <span class="dash-widget-icon"><i class="fa fa-usd"></i></span>
                                <div class="dash-widget-info">
                                    <h5>Ksh {{$totalBasicSalary ? number_format($totalBasicSalary): "0" }}</h5>
                                    <span>Total Basic Salary</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                        <div class="card dash-widget">
                            <div class="card-body">
                                <span class="dash-widget-icon"><i class="fa fa-usd"></i></span>
                                <div class="dash-widget-info">
                                    <h5>Ksh {{$totalGrossPay ? number_format($totalGrossPay): "0" }}</h5>
                                    <span>Total Gross Pay</span>
                                </div>
                            </div>
                        </div>
                    </div>
               
                    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                        <div class="card dash-widget">
                            <div class="card-body">
                            <span class="dash-widget-icon"><i class="fa fa-usd"></i></span>
                                <div class="dash-widget-info">
                                    <h5> Ksh {{$totalnhif ? number_format($totalnhif): "0" }}</h5>
                                    <span>Total NHIF</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                        <div class="card dash-widget">
                            <div class="card-body">
                            <span class="dash-widget-icon"><i class="fa fa-usd"></i></span>
                                <div class="dash-widget-info">
                                    <h5> Ksh {{$totalnssf ? number_format($totalnssf): "0" }}</h5>
                                    <span>Total NSSF</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                        <div class="card dash-widget">
                            <div class="card-body">
                            <span class="dash-widget-icon"><i class="fa fa-usd"></i></span>
                                <div class="dash-widget-info">
                                    <h5> Ksh {{$totalnhif ? number_format($totalnhif): "0" }}</h5>
                                    <span>Total NHIF</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                        <div class="card dash-widget">
                            <div class="card-body">
                            <span class="dash-widget-icon"><i class="fa fa-usd"></i></span>
                                <div class="dash-widget-info">
                                    <h5> Ksh {{$totalPayee ? number_format($totalPayee): "0" }}</h5>
                                    <span>Total P.A.Y.E</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                        <div class="card dash-widget">
                            <div class="card-body">
                            <span class="dash-widget-icon"><i class="fa fa-usd"></i></span>
                                <div class="dash-widget-info">
                                    <h5> Ksh {{$totalAfterTaxPay ? number_format($totalAfterTaxPay): "0" }}</h5>
                                    <span>Total After Tax Pay</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                        <div class="card dash-widget">
                            <div class="card-body">
                            <span class="dash-widget-icon"><i class="fa fa-usd"></i></span>
                                <div class="dash-widget-info">
                                    <h5> Ksh {{$totalNetSalary ? number_format($totalNetSalary): "0" }}</h5>
                                    <span>Total Net Pay</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>



            <div class="row">
              <div class="col-md-12">
                @if ($message = Session::get('message_nssf'))
                    <div class="alert alert-danger alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong>{{ $message }}</strong>
                    </div>
                @endif

                @if ($message = Session::get('message'))
                    <div class="alert alert-danger alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong>{{ $message }}</strong>
                    </div>
                @endif
            
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table table-striped custom-table table-bordered" id="salaries">
                            <thead>
                                <tr>
                                    <th>Employee ID</th>
                                    <th>Employee Name</th>
                                    <th>Basic Pay</th>
                                    <th>Gross Pay</th>
                                    <th>Personal Relief</th>
                                    <th>NHIF</th>
                                    <th>NSSF</th>
                                    <th>P.A.Y.E</th>
                                    <th>Pay After Tax</th>
                                    <th>Net Salary</th>
                                    <th class="text-right">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($payroll as $item)
                                <tr>
                                    <td>{{$item->users['employeeID'] }}</td>
                                    <td>
                                        <a href="#">{{$item->user['fname'] }} {{$item->user['lName'] }}</a>
                                    </td>
                                    <td>Ksh {{number_format($item->basic_salary) }}</td>
                                    <td>Ksh {{number_format($item->gross_pay) }}</td>
                                    <td>Ksh {{number_format($item->nhifAmount) }}</td>
                                    <td>Ksh {{number_format($item->nssfAmount) }}</td>
                                    <td>Ksh {{number_format($item->payee) }}</td>
                                    <td>Ksh {{number_format($item->total_salary) }}</td>
                                    <td>Ksh {{number_format($item->net_salary) }}</td>
                                    <td>Ksh {{number_format($item->pay_status) }}</td>
                                    <td class="text-right">
                                        <div class="dropdown dropdown-action">
                                            <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a class="dropdown-item" href="{{route('salaries.edit', $item->id )}}"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                              @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Page Content -->


    </div>
    <!-- /Page Wrapper -->
@endsection

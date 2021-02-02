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
                        <h3 class="page-title">Employee Salary</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                            <li class="breadcrumb-item active">Salary</li>
                        </ul>
                    </div>
                    <div class="col-auto float-right ml-auto">
                        <a href="#" class="btn add-btn" data-toggle="modal" data-target="#add_salary">
                            <i class="fa fa-plus"></i> Add Salary</a>
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
                                    <h5> Ksh {{$totalNetPay ? number_format($totalNetPay): "0" }}</h5>
                                    <span>Total Employee Net Salary</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                        <div class="card dash-widget">
                            <div class="card-body">
                                <span class="dash-widget-icon"><i class="fa fa-usd"></i></span>
                                <div class="dash-widget-info">
                                    <h5>Ksh {{$totalHseAllowance ? number_format($totalHseAllowance): "0" }}</h5>
                                    <span>Total House Allowance</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                        <div class="card dash-widget">
                            <div class="card-body">
                            <span class="dash-widget-icon"><i class="fa fa-usd"></i></span>
                                <div class="dash-widget-info">
                                    <h5>Ksh {{$totalTransportAllowance ? number_format($totalTransportAllowance): "0" }}</h5>
                                    <span>Total Transport Allowance</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                        <div class="card dash-widget">
                            <div class="card-body">
                            <span class="dash-widget-icon"><i class="fa fa-usd"></i></span>
                                <div class="dash-widget-info">
                                    <h5> Ksh {{$totalAirtimeAllowance ? number_format($totalAirtimeAllowance): "0" }}</h5>
                                    <span>Total Airtime Allowance</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                        <div class="card dash-widget">
                            <div class="card-body">
                            <span class="dash-widget-icon"><i class="fa fa-usd"></i></span>
                                <div class="dash-widget-info">
                                    <h5> Ksh {{$totalIncomeTax ? number_format($totalIncomeTax): "0" }}</h5>
                                    <span>Total Income Tax</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                        <div class="card dash-widget">
                            <div class="card-body">
                            <span class="dash-widget-icon"><i class="fa fa-usd"></i></span>
                                <div class="dash-widget-info">
                                    <h5> Ksh {{$totalNhifAllowance ? number_format($totalNhifAllowance): "0" }}</h5>
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


                </div>

            <div class="row">
              <div class="col-md-12">
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
                                    <th>#</th>
                                    <th>Employee ID</th>
                                    <th>Staff Name</th>
                                    <th>Bank Name</th>
                                    <th>Bank Branch</th>
                                    <th>Bank Code</th>
                                    <th>Account Number</th>
                                    <th>Basic Pay (Ksh)</th>
                                    <th>Transport Allowance (Ksh)</th>
                                    <th>House Allowance (Ksh)</th>
                                    <th>Airtime ( Ksh)</th>
                                    <th>Hospitality Allowance (Ksh)</th>
                                    <th>Gross Pay (Ksh)</th>
                                    <th>P.A.Y.E (Ksh)</th>
                                    <th>Personal Relief (Ksh)</th>
                                    <th>Income Tax (Ksh)</th>
                                    <th>NSSF (Ksh)</th>
                                    <th>NHIF (Ksh)</th>
                                    <th>Net Pay (Ksh)</th>
                                    <th>Reference</th>
                                    <th>Approval Status</th>
                                    <th>Status</th>
                                    <th class="text-right">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <form method="POST" action="{{route('payroll.store')}}">
                                  @csrf
                                @foreach ($salaries as $item)
                                <tr>
                                    <td>
                                        <input type="checkbox" name="userID[]" value="{{$item->users['id'] }}">
                                    </td>
                                    <td>{{$item->users['employeeID'] }}</td>
                                    <td>
                                      <a href="{{route('salaries.edit',$item->id  )}}">{{$item->users['fname'] }} {{$item->users['lName'] }}</a>
                                    </td>
                                    <td> {{$item->bankName }}</td>
                                    <td> {{$item->bankBranch }}</td>
                                    <td> {{$item->bankCode }}</td>
                                    <td> {{$item->beneficiaryAccountNumber }}</td>
                                    <td> {{number_format($item->basic_salary) }}</td>
                                    <td> {{number_format($item->transport_allowance) }}</td>
                                    <td> {{number_format($item->hse_allowance) }}</td>
                                    <td> {{number_format($item->airtime_allowance) }}</td>
                                    <td> {{number_format($item->hospitality_allowance) }}</td>
                                    <td> {{number_format($item->gross_pay) }}</td>
                                    <td> {{number_format($item->payee) }}</td>
                                    <td> {{number_format($item->personalRelief) }}</td>
                                    <td> {{number_format($item->incomeTax) }}</td>
                                    <td> {{number_format($item->nssf) }}</td>
                                    <td> {{number_format($item->nhif) }}</td>
                                    <td> {{number_format($item->net_pay) }}</td>
                                    <td> {{$item->reference }}</td>
                                    <td> {{$item->approval_status }}</td>
                                    <td> {{$item->status }}</td>
                                    <td class="text-right">
                                        <a class="" href="{{route('salaries.edit', $item->id )}}"><i class="fa fa-pencil m-r-5"></i> </a>
                                    </td>
                                </tr>


                              @endforeach
                              <div class="submit-section text-right">
                                <button type="submit" class="btn btn-primary">Generate Payroll</button>
                            </div>
                        </form>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Page Content -->

        <!-- Add Salary Modal -->
        <div id="add_salary" class="modal custom-modal fade" role="dialog">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Add Employee Salary</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="{{route('salaries.store')}}">
                            @csrf
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Employee</label>
                                        <select name="user_id" class="select">
                                            <option value="" disabled selected>Select Employee</option>
                                            @foreach ($employees as $item)
                                              <option value="{{$item->id}}">{{$item->fname}} {{$item->lName}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Job Group</label>
                                        <select name="job_group" class="select">
                                            <option value="" disabled selected>Select Job Group</option>
                                            @foreach ($jobgroup as $item)
                                            <option value="{{$item->jonGroupName}}" >{{$item->jonGroupName}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                 <div class="col-sm-4">
                                    <div class="form-group">
                                        <input name="basic_salary" placeholder="Basic Salary" class="form-control" type="text">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <input name="hse_allowance" placeholder="House Allowance" class="form-control" type="text">
                                    </div>
                               </div>
                               <div class="col-sm-4">
                                    <div class="form-group">
                                        <input name="transport_allowance" placeholder="Transport Allowance " class="form-control" type="text">
                                    </div>
                               </div>
                               <div class="col-sm-4">
                                    <div class="form-group">
                                        <input name="airtime_allowance" Placeholder="Airtime Amount" class="form-control" type="text">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <input name="hospitality_allowance" Placeholder="Hospitality" class="form-control" type="text">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <input name="gross_pay" Placeholder="Gross Pay" class="form-control" type="text">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <input name="payee" Placeholder="P.A.Y.E" class="form-control" type="text">
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <input name="personalRelief" Placeholder="Personal Relief" class="form-control" type="text">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <input name="incomeTax" Placeholder="Income Tax" class="form-control" type="text">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <input name="nhif" Placeholder="NHIF Amount" class="form-control" type="text">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <input name="net_pay" Placeholder="Net Pay" class="form-control" type="text">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <input name="beneficiaryAccountNumber" Placeholder="Beneficiary Account Number" class="form-control" type="text">
                                    </div>
                                </div>

                                 <div class="col-sm-4">
                                    <div class="form-group">
                                        <input name="bankName" value="KCB KAPSABET"  class="form-control" type="text" readonly>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <input name="bankBranch" value="KCB KAPSABET"  class="form-control" type="text" readonly>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <input name="bankCode" value="01166" class="form-control" type="text" readonly>
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <input name="reference" Placeholder="" value="Salary" class="form-control" type="text" readonly>
                                    </div>
                                </div>
                            </div>

                            <div class="submit-section">
                                <button class="btn btn-primary submit-btn">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Add Salary Modal -->

    </div>
    <!-- /Page Wrapper -->
@endsection

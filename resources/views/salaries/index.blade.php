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
                        <form method="POST" action="{{url('payroll/process-all')}}">
                            @csrf
                        <table class="table table-striped  table-bordered" id="allsalaries">
                            <thead>
                                <button type="submit" class="btn btn-outline-primary text-right">Refresh All Payroll</button>
                                <tr>
                                    <th>
                                       <input type="checkbox" name="select_all"  id="select_all">
                                   </th>
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
                                    <th class="text-right">Action</th>
                                    <th>Payment Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($salaries as $item)
                                <tr>
                                    <td>
                                        <input type="checkbox"  name="salaries[]" class="allusers" value="{{$item->users['id'] }}"/>
                                    </td>
                                    <td>{{$item->users['employeeID'] }}</td>
                                    <td>
                                      <a href="{{route('salaries.edit',$item->id  )}}">
                                             {{$item->users['fname'] }} {{$item->users['lName'] }}
                                      </a>
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
                                    <td class="text-ceter">
                                        <a class="" href="{{route('salaries.edit', $item->id )}}">
                                            <i class="fa fa-pencil m-r-5"></i>
                                        </a>
                                    </td>
                                    <td>
                                        @php
                                            $status = thisMonthsPayroll($item->users['id'])
                                        @endphp

                                        @if( $status =="pending" || empty($status))
                                        <a id="process_salary" class="btn btn-outline-danger" data-url="{{ route('payroll.store', $item->id) }}" data-name="{{$item->users['fname'] . " ".$item->users['lName']  }}"   data-salaryid="{{$item->id }}" data-toggle="modal" data-target="#modal-leave-{{ $item->id }}">
                                            Proccess Salary
                                        </a>

                                         <!-- Add Salary Modal -->
                                         <div  class="modal custom-modal fade" role="dialog" id="modal-leave-{{ $item->id }}">
                                            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title"> Would you like to proccesss this payment ?</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form method="POST" action="{{route('payroll.store')}}">
                                                            @csrf
                                                            <div class="row">
                                                                <input name="user_id" Placeholder="" value="{{$item->users['id']}}" class="form-control" type="hidden">
                                                                <input name="basic_salary" Placeholder="" value="{{$item->basic_salary}}" class="form-control" type="hidden">
                                                                <input name="gross_pay" Placeholder="" value="{{$item->gross_pay}}" class="form-control" type="hidden">
                                                                <input name="nssf" Placeholder="" value="{{$item->nssf}}" class="form-control" type="hidden">
                                                                <input name="nhif" Placeholder="" value="{{$item->nhif}}" class="form-control" type="hidden">
                                                                <input name="payee" Placeholder="" value="{{$item->payee}}" class="form-control" type="hidden">
                                                                <input name="net_pay" Placeholder="" value="{{$item->net_pay}}" class="form-control" type="hidden">
                                                                <input name="bankName" Placeholder="" value="{{$item->bankName}}" class="form-control" type="hidden">
                                                                <input name="bankBranch" Placeholder="" value="{{$item->bankBranch}}" class="form-control" type="hidden">
                                                                <input name="bankCode" Placeholder="" value="{{$item->bankCode}}" class="form-control" type="hidden">
                                                                <div class="col-sm-6">
                                                                    <div class="form-group">
                                                                        <label for=""> Beneficiary Name </label>
                                                                        <input name="name" Placeholder="" value="{{$item->users['fname'] . " ".$item->users['lName']  }}" class="form-control" type="text" readonly>
                                                                    </div>
                                                                </div>

                                                                <div class="col-sm-6">
                                                                    <div class="form-group">
                                                                        <label for=""> Beneficiary Account Number </label>
                                                                        <input name="beneficiaryAccountNumber" Placeholder="" value="{{$item->beneficiaryAccountNumber }}" class="form-control" type="text" readonly>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-12">
                                                                    <div class="form-group">
                                                                        <label>Payroll Status</label>
                                                                        <select name="status" class="select form-control">
                                                                            <option value="" disabled selected>Payroll Status</option>
                                                                              <option value="pending">Pending</option>
                                                                              <option value="processed">Proccess</option>
                                                                              <option value="rejected">Reject</option>

                                                                        </select>
                                                                    </div>
                                                                </div>

                                                            </div>

                                                            <div class="submit-section text-right">
                                                                <button type="submit" class="btn btn-primary">Submit</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /Add Salary Modal -->
                                        @elseif($status == "processed")
                                          <div class=" btn bg-success font-weight-bold text-white">
                                            <i class="fa fa-lock text-white"></i>
                                            {{ $status  }}
                                          </div>
                                        @elseif ($status == "rejected")
                                            <div class="text-muted">
                                               {{ $status  }}
                                            </div>

                                        @endif
                                    </td>
                                </tr>
                              @endforeach
                            </tbody>
                        </table>
                    </form>
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
                                        <select name="user_id" class="select form-control">
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
                                        <select name="job_group" class="select form-control">
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
                                        <label for="">Other Deductions</label>
                                        <input name="otherDeductions" Placeholder="Other Deductions" class="form-control" type="text">
                                    </div>
                                </div>

                                 <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="">Bank Name</label>
                                        <input name="bankName" value="KCB KAPSABET"  class="form-control" type="text" readonly>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="">Bank Branch</label>
                                        <input name="bankBranch" value="KCB KAPSABET"  class="form-control" type="text" readonly>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="">Bank Code</label>
                                        <input name="bankCode" value="01166" class="form-control" type="text" readonly>
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for=""> Reference</label>
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

@push('custom-javascripts')
<script>

</script>

@endpush

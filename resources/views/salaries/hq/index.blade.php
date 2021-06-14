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
                                    <h3 class="page-title"> HQ Salaries </h3>
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
                        </div>

                    	<!-- Tabs -->
						<div class="row pb-4">
							<div class="col-lg-12">
										<ul class="nav nav-tabs nav-tabs-top">
                                            <li class="nav-item "><a class="nav-link profile-tab" href="#top-tab1" data-toggle="tab">HQ Salaries</a></li>
                                            <li class="nav-item"><a class="nav-link profile-tab" href="#top-tab2" data-toggle="tab">Payroll To Bank</a></li>
                                            <li class="nav-item"><a class="nav-link profile-tab" href="#top-tab3" data-toggle="tab">Payslips</a></li>
                                        </ul>

										<div class="tab-content">
                                                <div class="tab-pane show active" id="top-tab1">

                                                <div class="table-responsive ">
                                                    <table class="table table-bordered" id="hsalaries">
                                                            <thead>
                                                                <tr>
                                                                    <th>
                                                                       <input id="select_all" type="checkbox">
                                                                    </th>
                                                                    <th>Staff Name</th>
                                                                    <th>Employee ID</th>
                                                                    <th>Job Group</th>
                                                                    <th>Region</th>
                                                                    <th>DCC</th>
                                                                    <th>LCC</th>
                                                                    <th>Basic Pay (Ksh)</th>
                                                                    <th>Transport Allowance (Ksh)</th>
                                                                    <th>House Allowance (Ksh)</th>
                                                                    <th>Airtime ( Ksh)</th>
                                                                    <th>Hospitality Allowance (Ksh)</th>
                                                                    <th>Gross Pay (Ksh)</th>
                                                                    <th>leave Status</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody mb-5>
                                                                @php ($count = 1)
                                                                @foreach ($hqsalary as $item)
                                                                @if(!empty($item->salary))
                                                                        <tr>
                                                                            <td>
                                                                                <input type="checkbox"  name="salaries[]" class="allusers" value="{{$item->users['id'] }}" />
                                                                            </td>

                                                                            <td>
                                                                                <a href="{{route('salaries.edit',$item->salary['id'] )}}">
                                                                                    {{$item->fname }} {{$item->lName }}
                                                                             </a>
                                                                            </td>
                                                                            <td>{{$item->employeeID }}</td>
                                                                            <td>  {{  $item->jobgroup['jonGroupName']}}</td>
                                                                            <td>   {{  $item->region['rName']}}</td>
                                                                            <td>   {{  $item->dcc['dccName']}}</td>
                                                                            <td>   {{  $item->lcc['lccName']}}</td>
                                                                            <td> {{number_format($item->salary['basic_salary']) }}</td>
                                                                            <td> {{number_format($item->salary['transport_allowance']) }}</td>
                                                                            <td> {{number_format($item->salary['hse_allowance']) }}</td>
                                                                            <td> {{number_format($item->salary['airtime_allowance']) }}</td>
                                                                            <td> {{number_format($item->salary['hospitality_allowance']) }}</td>
                                                                            <td> {{number_format($item->salary['gross_pay']) }}</td>
                                                                            <td>
                                                                                @if(getLeaveStatus($item->id)  == "pending")
                                                                                <i class="fa fa-thumbs-down  text-danger" aria-hidden="true"></i>
                                                                                {{ getLeaveStatus($item->id) }}
                                                                              @elseif(getLeaveStatus($item->id)  == "approved")
                                                                                <i class="fa fa-check-circle text-success"></i>
                                                                                {{ getLeaveStatus($item->id) }}
                                                                              @elseif(getLeaveStatus($item->id)  == "declined")
                                                                                 <i class="fa fa-times-circle" aria-hidden="true"></i> {{ getLeaveStatus($item->id) }}
                                                                              @else
                                                                                 {{ "Active" }}
                                                                              @endif
                                                                            </td>
                                                                        </tr>
                                                                @endif
                                                            @endforeach
                                                            </tbody>
                                                        </table>
                                                </div>
											</div>

											<div class="tab-pane show" id="top-tab2">
                                                <div class="table-responsive mt-4">
                                                    <table class="table table-bordered table-striped table-hover" id="hqpayroll">
                                                        <thead>
                                                            <tr>
                                                                <th>Serial No</th>
                                                                <th>Beneficiary Name</th>
                                                                <th>Bank Name </th>
                                                                <th>Branch</th>
                                                                <th>Bank Code</th>
                                                                <th>Beneficiary Account Number</th>
                                                                <th>Net Pay</th>
                                                                <th>Reference</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @php($count =1)
                                                            @foreach ($userpayroll as $item)
                                                            <tr>
                                                                    @if (!empty($item->payroll))
                                                                    <td>{{$count++ }}</td>
                                                                    <td>
                                                                         {{$item->fname}} {{$item->lName }}
                                                                    </td>
                                                                  <td>
                                                                        {{ !empty($item->payroll) ? $item->payroll->bankName:' ' }}
                                                                 </td>
                                                                 <td>
                                                                    {{ !empty($item->payroll) ? $item->payroll->bankBranch:' ' }}
                                                             </td>
                                                                 <td>
                                                                    {{ !empty($item->payroll) ? $item->payroll->bankCode:' ' }}
                                                                </td>

                                                                <td>
                                                                    {{ !empty($item->payroll) ? $item->payroll->beneficiaryAccountNumber:' ' }}
                                                             </td>
                                                             <td>
                                                                {{ !empty($item->payroll) ? number_format($item->payroll->net_pay):' ' }}
                                                            </td>
                                                            <td>
                                                                {{ !empty($item->payroll) ? $item->payroll->reference:' ' }}
                                                            </td>
                                                            </tr>
                                                            @endif
                                                          @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
											</div>

											<div class="tab-pane" id="top-tab3">
                                                <div class="table-responsive ">
                                                    <table id="hqpayslips" class="table table-bordered">
                                                        <thead>
                                                            <tr>
                                                                <th>S/N</th>
                                                                <th>Employee No</th>
                                                                <th>Month</th>
                                                                <th>Year</th>
                                                                <th>Employee Name</th>
                                                                <th>Position</th>
                                                                <th>Job Group</th>
                                                                <th>Region</th>
                                                                <th>DCC</th>
                                                                <th>LCC</th>
                                                                <th>Basic Pay</th>
                                                                <th>Gross Pay</th>
                                                                <th>N.H.I.F</th>
                                                                <th>N.S.S.F</th>
                                                                <th>Taxable Income</th>
                                                                <th>Payee</th>
                                                                <th>Monthly Relief</th>
                                                                <th>Other Deductions</th>
                                                                <th>Net Pay</th>

                                                                <th>Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>

                                                            @php($count =1)
                                                            @foreach ($userpayroll as $item)
                                                            <tr>
                                                                    @if (!empty($item->payroll))
                                                                    <td>{{ $count++ }}</td>
                                                                    <td> {{$item->employeeID }}</td>
                                                                    <td>
                                                                        {{ \Carbon\Carbon::parse($item->month)->format('F') }}
                                                                    </td>
                                                                    <td>
                                                                        {{ $item->payroll->year}}
                                                                    </td>
                                                                    <td>
                                                                        {{$item->fname}} {{$item->lName }}
                                                                    </td>
                                                                    <td> {{$item->joining_position }}</td>
                                                                    <td>
                                                                        {{  $item->jobgroup->jonGroupName}}
                                                                 </td>
                                                                 <td>   {{  $item->region->rName}}</td>
                                                                 <td>   {{  $item->dcc->dccName}}</td>
                                                                 @if ( $item->lcc)
                                                                    <td>   {{  $item->lcc->lccName}}</td>
                                                                 @endif
                                                                  <td>
                                                                        {{ !empty($item->payroll) ? $item->payroll->basic_salary: "" }}
                                                                 </td>
                                                                 <td>
                                                                    {{ !empty($item->payroll) ? $item->payroll->gross_pay: ""}}
                                                                </td>
                                                                    <td>
                                                                        {{ !empty($item->payroll) ? $item->payroll->nhif :""}}
                                                                    </td>

                                                                <td>
                                                                    {{ !empty($item->payroll) ? $item->payroll->nssf: ""}}
                                                             </td>
                                                             <td>
                                                                {{ !empty($item->payroll) ? number_format($item->payroll->incomeTax): ""}}
                                                            </td>
                                                            <td>
                                                                {{ !empty($item->payroll) ? number_format($item->payroll->payee): ""}}
                                                            </td>

                                                           <td>   {{ !empty($item->payroll) ? number_format($item->payroll->personalRelief): ""}} </td>
                                                           <td>   {{ !empty($item->payroll) ? number_format($item->payroll->otherDeductions): ""}} </td>
                                                            <td>
                                                                {{ !empty($item->payroll) ? number_format($item->payroll->net_pay): ""}}
                                                            </td>

                                                            <td>

                                                            <a href="{{ route('payslip.show',$item->payroll->user_id) }}">
                                                                <i class="fa 2x fa-download"></i> Download
                                                            </a>

                                                            </td>
                                                        </tr>
                                                          @endif

                                                          @endforeach

                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>

										</div>
							</div>
						</div>
					<!-- /Tabs -->
        </div>
    </div>
    <!-- /Page Wrapper -->
@endsection
@push('custom-javascripts')

@endpush

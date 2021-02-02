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
                        <h3 class="page-title">Employee HQ Payroll</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ route('dashboard') }}">Dashboard</a>
                            </li>
                            <li class="breadcrumb-item active">HQ Payroll : (Ksh)</li>
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
                    	<!-- Tabs -->
					<section class="comp-section" id="comp_tabs">
						<div class="row">
							<div class="col-lg-12">
								<div class="card">
									<div class="card-body">
										<ul class="nav nav-tabs nav-tabs-top">
                                            <li class="nav-item"><a class="nav-link" href="#top-tab2" data-toggle="tab">Payroll</a></li>
                                            <li class="nav-item"><a class="nav-link" href="#top-tab3" data-toggle="tab">Payslips</a></li>
                                        </ul>
                                        
										<div class="tab-content">
                                           
											<div class="tab-pane show active" id="top-tab2">
                                                <div class="table-responsive">
                                                    <table id="payroll" class="table table-striped custom-table table-bordered" id="salaries">
                                                        <thead>
                                                            <tr>
                                                                <th>Serial No</th>
                                                                <th>Beneficiary Name</th>
                                                                <th>Bank Name & Branch</th>
                                                                <th>Bank Code</th>
                                                                <th>Beneficiary Acount Number</th>
                                                                <th>Net Pay</th>                                                      
                                                                <th>Reference</th>
                                                                
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @php($count =1)
                                                            @foreach ($payroll as $item)
                                                            <tr> 
                                                                @foreach ($item->user as $user)
                                                                  <td>{{ $count++ }}</td>
                                                                  <td>{{$user['fname'] }} {{$user['lName'] }}</td>
                                                                @endforeach
                                                                @foreach ($item->salary as $salo)
                                                                
                                                                <td>{{$salo['bankName'] }} {{$salo['bankBranch'] }}</td>
                                                                <td>{{$salo['bankCode'] }}</td>
                                                                <td>{{ $salo['beneficiaryAccountNumber'] }}</td>
                                                                <td>{{$salo['net_pay'] }} </td>
                                                                <td>{{$salo['reference'] }} </td>
                                                                @endforeach
                                                                
                                                            </tr>
                                                          @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
											</div>
											<div class="tab-pane" id="top-tab3">
                                                <div class="table-responsive">
                                                    <table id="payslips" class="table table-striped custom-table table-bordered" id="salaries">
                                                        <thead>
                                                            <tr>
                                                                <th>Staff No</th>
                                                                <th>Employee Name</th>
                                                                <th>Basic Pay</th>
                                                                <th>Gross Pay</th>
                                                                <th>N.H.I.F</th>
                                                                <th>N.S.S.F</th>
                                                                <th>Payee(Tax)</th>
                                                                <th>Total Statutory</th>
                                                                <th>Net Pay</th>
                                                                <th>Month</th>
                                                                <th>Year</th>
                                                                <th>Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($payroll as $item)
                                                            <tr> 
                                                                @foreach ($item->user as $user)
                                                                  <td>{{$user['employeeID'] }}</td>
                                                                  <td>{{$user['fname'] }} {{$user['lName'] }}</td>
                                                                @endforeach
                                                                @foreach ($item->salary as $salo)
                                                                    <td>{{number_format($salo['basic_salary']) }} </td>
                                                                    <td>{{number_format($salo['gross_pay']) }} </td>
                                                                    <td>{{number_format($salo['nhif']) }} </td>
                                                                    <td>{{number_format($salo['nssf']) }} </td>
                                                                    <td>{{number_format($salo['payee']) }} </td>
                                                                    <td>{{number_format($salo['nhif'] + $salo['nssf'] + $salo['payee']) }} </td>
                                                                    <td>{{number_format($salo['net_pay']) }} </td>
                                                                @endforeach
                                                                <td> {{ date("F",strtotime($item->month)) }}</td>
                                                                <td> {{$item->year }}</td>
                                                                <td> 
                                                                    {{-- <a class="pr-3" href="#"><i class="fa 2x fa-eye"></i></a>
                                                                    <a class="pr-3" href="#"><i class="fa 2x fa-print"></i></a>  --}}
                                                                    <a href="{{ route('payslip.show',$item->user_id) }}"><i class="fa 2x fa-download"></i></a>
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
							</div>

						
						</div>
					</section>
					<!-- /Tabs -->
                
                    
                    </div>

                  
                </div>
            </div>
        </div>
        <!-- /Page Content -->


    </div>
    <!-- /Page Wrapper -->
@endsection

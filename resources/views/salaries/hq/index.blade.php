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
                                                            @foreach ($payroll as $key => $value)
                                                            <tr>
                                                                <td>{{ $count++ }}</td>
                                                                <td>{{$value['fname'] }} {{$value['lName'] }}</td>
                                                               @foreach ($value->salary as $key => $val)
                                                                    dd($val)
                                                               @endforeach
                                                                <td>{{ $count++ }}</td>
                                                                <td>{{ $count++ }}</td>
                                                                <td>{{ $count++ }}</td>
                                                                <td>{{ $count++ }}</td>


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
                                                                <th>Employee Type</th>
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

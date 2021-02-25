@extends('layouts.app')

@section('content')


			<!-- Page Wrapper -->
            <div class="page-wrapper">

				<!-- Page Content -->
                <div class="content container-fluid">

					<!-- Page Header -->
					<div class="page-header">
						<div class="row">
							<div class="col-sm-12">
								<h3 class="page-title">Profile</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item">
                                        <a href="{{ route('dashboard') }}">Dashboard</a>
                                    </li>
									<li class="breadcrumb-item active">{{ $employee->fname }} {{ $employee->lName }}</li>
								</ul>
							</div>
						</div>
					</div>
					<!-- /Page Header -->

					<div class="card mb-0">
						<div class="card-body">
							<div class="row">
								<div class="col-md-12">
									<div class="profile-view">
										<div class="profile-img-wrap">
											<div class="profile-img">
                                                @if($employee->avatar)
                                                <img  src="{{ asset('storage'.$employee->avatar) }}"  />
                                               @else
                                                <img  src="{{ asset('storage/uploads/images/account.png') }}"/>
                                               @endif
											</div>
										</div>
										<div class="profile-basic">
											<div class="row">
												<div class="col-md-5">
													<div class="profile-info-left">
														<h3 class="user-name m-t-0 mb-0">{{$employee->fname}} {{$employee->lName}}</h3>
														<small class="text-muted">{{$employee->joining_position}}</small>
														<div class="staff-id">Employee ID : {{$employee->employeeID}}</div>
														<div class="small doj text-muted">Join Date: {{$employee->joining_date}}</div>
													</div>
												</div>
												<div class="col-md-7">
													<ul class="personal-info">
														<li>
															<div class="title">Phone:</div>
															<div class="text">{{$employee->phoneNumber}}</div>
														</li>
														<li>
															<div class="title">Email:</div>
															<div class="text">
                                                                <a href="mailto:{{$employee->email}}">{{$employee->email}}</a></div>
														</li>
														<li>
															<div class="title">Birthday:</div>
															<div class="text">{{$employee->date_of_birth}}</div>
														</li>
														<li>
															<div class="title">Address:</div>
															<div class="text">{{$employee->current_address}}</div>
														</li>
														<li>
															<div class="title">Gender:</div>
															<div class="text">{{$employee->gender}}</div>
														</li>
													</ul>
												</div>
											</div>
										</div>
								</div>
							</div>
						</div>
					</div>

					<div class="card tab-box">
						<div class="row user-tabs">
							<div class="col-lg-12 col-md-12 col-sm-12 line-tabs">
								<ul class="nav nav-tabs nav-tabs-bottom">
									<li class="nav-item"><a href="#emp_profile" data-toggle="tab" class="nav-link active">Profile</a></li>
									<li class="nav-item"><a href="#bank_statutory" data-toggle="tab" class="nav-link">Edit Profile <small class="text-danger"></small></a></li>
								</ul>
							</div>
						</div>
					</div>

					<div class="tab-content">

						<!-- Profile Info Tab -->
						<div id="emp_profile" class="pro-overview tab-pane fade show active">
							<div class="row">
								<div class="col-md-6 d-flex">
									<div class="card profile-box flex-fill">
										<div class="card-body">
											<h3 class="card-title">Personal Informations
                                            </h3>
											<ul class="personal-info">
												<li>
													<div class="title">Name.</div>
													<div class="text">{{$employee->fName}} {{$employee->otherNames}} {{$employee->lName}}</div>
												</li>
												<li>
													<div class="title">Email.</div>
													<div class="text">{{$employee->email}} </div>
												</li>
												<li>
													<div class="title">Tel</div>
													<div class="text">{{$employee->phoneNumber}}</div>
												</li>
												<li>
													<div class="title">Alt Tel.</div>
													<div class="text">{{$employee->altPhoneNumber}}</div>
												</li>
												<li>
													<div class="title">NHIF No.</div>
													<div class="text">{{$employee->nhifNo}}</div>
												</li>
												<li>
													<div class="title">NSSF No.</div>
													<div class="text">{{$employee->nssfNo}}</div>
												</li>
												<li>
													<div class="title">National ID</div>
													<div class="text">{{$employee->nationalID}}</div>
												</li>
												<li>
													<div class="title">Employee ID</div>
													<div class="text">{{$employee->employeeID}}</div>
												</li>
											</ul>
										</div>
									</div>
								</div>
								<div class="col-md-6 d-flex">

									<div class="card profile-box flex-fill">
										<div class="card-body">
											<h3 class="card-title">Other Details
                                            </h3>
											<ul class="personal-info">
												<li>
													<div class="title">Current Residence.</div>
													<div class="text">{{$employee->current_address}}</div>
												</li>
												<li>
													<div class="title">Permanent Residence.</div>
													<div class="text">{{$employee->permanent_address}} </div>
												</li>
												<li>
													<div class="title">Home County</div>
													<div class="text">{{$employee->home_county}}</div>
												</li>
												<li>
													<div class="title">Position.</div>
													<div class="text">{{$employee->joining_position}}</div>
												</li>
												<li>
													<div class="title">Date of Birth.</div>
													<div class="text">{{$employee->date_of_birth}}</div>
												</li>
												<li>
													<div class="title">Gender.</div>
													<div class="text">{{$employee->gender}}</div>
												</li>
												<li>
													<div class="title">Marital Status</div>
													<div class="text">{{$employee->marital_status}}</div>
												</li>
												<li>
													<div class="title">Joining Date</div>
													<div class="text">{{$employee->joining_date}}</div>
												</li>
											</ul>
										</div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6 d-flex">
									<div class="card profile-box flex-fill">
										<div class="card-body">
											<h3 class="card-title">Spouse Details</h3>
											<ul class="personal-info">
												<li>
													<div class="title">Name</div>
													<div class="text">{{$employee->spouse_fname}} {{$employee->spouse_lname}}</div>
												</li>
												<li>
													<div class="title">Phone Number</div>
													<div class="text">{{$employee->spouse_phoneNumber}}</div>
												</li>
												<li>
													<div class="title">Alternative Phone Number</div>
													<div class="text">{{$employee->altPhoneNumber}}</div>
												</li>
												<li>
													<div class="title">National ID</div>
													<div class="text">{{$employee->spouse_nationalId}}</div>
												</li>
											</ul>
										</div>
									</div>
								</div>
								<div class="col-md-6 d-flex">
									<div class="card profile-box flex-fill">
										<div class="card-body">
											<h3 class="card-title">Next Of Details</h3>
											<ul class="personal-info">
												<li>
													<div class="title">Name</div>
													<div class="text">{{$employee->next_of_kin_fname}} {{$employee->next_of_kin_lname}}</div>
												</li>
												<li>
													<div class="title">Phone Number</div>
													<div class="text">{{$employee->next_of_kin_phoneNumber}}</div>
												</li>
												<li>
													<div class="title">Alternative Phone Number</div>
													<div class="text">{{$employee->next_of_kin_altPhoneNumber}}</div>
												</li>
												<li>
													<div class="title">National ID</div>
													<div class="text">{{$employee->next_of_kin_nationalId}}</div>
												</li>
											</ul>
										</div>
									</div>
								</div>
							</div>
							<div class="row">
							<div class="col-md-6 d-flex">
									<div class="card profile-box flex-fill">
										<div class="card-body">
											<h3 class="card-title">Bank Details
                                                </h3>
											<div class="experience-box">
												<ul class="experience-list">
													<li>
														<div class="experience-user">
															<div class="before-circle"></div>
														</div>
														<div class="experience-content">
															<div class="timeline-content">
																<a href="#/" class="name">Bank Name</a>
																<span class="time">{{$employee->bankName}} Equity</span>
															</div>
														</div>
													</li>
													<li>
														<div class="experience-user">
															<div class="before-circle"></div>
														</div>
														<div class="experience-content">
															<div class="timeline-content">
																<a href="#/" class="name">Branch</a>
																<span class="time">{{$employee->bankBranch}} Machakos</span>
															</div>
														</div>
													</li>
													<li>
														<div class="experience-user">
															<div class="before-circle"></div>
														</div>
														<div class="experience-content">
															<div class="timeline-content">
																<a href="#/" class="name">Account No.</a>
																<span class="time">{{$employee->accountNumber}} 09789757545</span>
															</div>
														</div>
													</li>
												</ul>
											</div>
										</div>
									</div>
								</div>
								<div class="col-md-6 d-flex">
									<div class="card profile-box flex-fill">
										<div class="card-body">
											<h3 class="card-title">Department
                                            </h3>
											<div class="experience-box">
												<ul class="experience-list">
													<li>
														<div class="experience-user">
															<div class="before-circle"></div>
														</div>
														<div class="experience-content">
															<div class="timeline-content">
																<a href="#/" class="name">Region</a>
																<span class="time">Kapsabet</span>
															</div>
														</div>
													</li>
													<li>
														<div class="experience-user">
															<div class="before-circle"></div>
														</div>
														<div class="experience-content">
															<div class="timeline-content">
																<a href="#/" class="name">District Church Council</a>
																<span class="time">Kapsabet South</span>
															</div>
														</div>
													</li>
													<li>
														<div class="experience-user">
															<div class="before-circle"></div>
														</div>
														<div class="experience-content">
															<div class="timeline-content">
																<a href="#/" class="name">Local Church Council</a>
																<span class="time">Kapsokwon</span>
															</div>
														</div>
													</li>
												</ul>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<!-- /Profile Info Tab -->



						<!-- Bank Statutory Tab -->
						<div class="tab-pane fade" id="bank_statutory">
						<div class="card">
                <div class="card-header">{{ __('Edit Employee') }}</div>
                <div class="card-body">
                    @if(session()->has('message'))
                    <div class="alert alert-danger">
                        <a href="#" class="close" data-dismiss="alert">&times;</a>
                      {{session('message')}}
                    </div>
                    @endif
                    <!-- Only fields withe errors are to be validated -->
                    <form method="POST" action="{{ route('employees.update',  Auth::user()->id) }}">
                        {{ method_field('PUT') }}
                        @csrf
                        <div class="row">
                            <div class="col-md-4">
                                <label for="fname">First Name*</label>
                                <input id="fname" placeholder="First Name" type="text" class="form-group form-control @error('fname') is-invalid @enderror" name="fname" value="{{ $employee->fName }}"  autocomplete="fname" autofocus>
                                @error('fname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-4">
							   <label for="lname">Last Name*</label>
                                <input id="lName" placeholder="Last Name" type="text" class="form-control @error('lName') is-invalid @enderror" name="lName" value="{{ $employee->lName }}"  autocomplete="lName" autofocus>
                                @error('lName')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-4">
					      		<label for="otherName">Other Names*</label>
                                <input id="name" placeholder="Other Names" type="text" class="form-control @error('otherNames') is-invalid @enderror" name="otherNames" value="{{ $employee->otherNames }}"  autocomplete="otherNames" autofocus>
                                @error('otherNames')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-md-4">
							    <label for="email">Email</label>
                                <input id="email" placeholder="Email" type="email" class="form-group form-control @error('email') is-invalid @enderror" name="email" value="{{ $employee->email }}"  autocomplete="email">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-md-4">
							    <label for="phoneNumber">Phone Number</label>
                                <input id="phonenumber" placeholder="Phone Number" type="text" class="form-group form-control @error('phoneNumber') is-invalid @enderror" name="phoneNumber" value="{{ $employee->phoneNumber }}"    autocomplete="phoneNumber">
                                @error('phoneNumber')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-md-4">
							    <label for="altPhoneNumber">Alt Phone Number</label>
                                <input id="altPhoneNumber" placeholder="Alt Phone Number" type="text" class="form-group form-control @error('altPhoneNumber') is-invalid @enderror" name="altPhoneNumber"  value="{{ $employee->altPhoneNumber }}" autocomplete="altPhoneNumber">
                                @error('altPhoneNumber')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-md-4">
							    <label for="emergencyPhoneNumber">Emergency Phone Number</label>
                                <input id="emergencyPhoneNumber" placeholder="Emergency Phone No" type="text" class="form-group form-control @error('emergency_contact') is-invalid @enderror" name="emergency_contact"  value="{{ $employee->emergency_contact }}"  autocomplete="emergencyPhoneNumber">
                                @error('emergency_contact')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-md-4">
							    <label for="nhifNo">Nhif Number</label>
                                <input id="nhifNo" placeholder="NHIF" type="text" class="form-group form-control @error('nhifNo') is-invalid @enderror" name="nhifNo"  value="{{ $employee->nhifNo }}"   autocomplete="nhifNo">
                                @error('nhifNo')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-md-4">
							     <label for="nssfNo">Nssf Number</label>
                                <input id="nssfNo" placeholder="NSSF" type="text" class="form-group form-control @error('nssfNo') is-invalid @enderror" name="nssfNo" value="{{ $employee->nssfNo }}"   autocomplete="nssfNo">
                                @error('nssfNo')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-md-4">
							    <label for="nationalID">national ID</label>
                                <input id="nationalID" placeholder="National ID" type="text" class="form-group form-control @error('nationalID') is-invalid @enderror" name="nationalID"  value="{{ $employee->nationalID }}"   autocomplete="nationalID">
                                @error('nationalID')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-md-4">
							    <label for="present_residence">Current Residence</label>
                                <input id="present_residence" placeholder="Current Residence" type="text" class="form-group form-control @error('present_residence') is-invalid @enderror" name="present_residence" value="{{ $employee->present_residence }}"   autocomplete="present_residence">
                                @error('present_residence')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-4">
							     <label for="permanent_residenec">Permanent Residence</label>
                                <input id="permanent_residence" placeholder="Permanent Residence" type="text" class="form-group form-control @error('permanent_residence') is-invalid @enderror" name="permanent_residence" value="{{ $employee->permanent_residence }}"   autocomplete="permanent_residence">
                                @error('permanent_residence')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-4">
							     <label for="home_county">Home County</label>
                                <input id="home_county" placeholder="Home County" type="text" class="form-group form-control @error('home_county') is-invalid @enderror" name="home_county" value="{{ $employee->home_county }}"   autocomplete="home_county">
                                @error('home_county')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-md-4">
							    <label for="employeeID">Employee ID</label>
                                <input id="employeeID" placeholder="Employee ID" type="text" class="form-group form-control @error('employeeID') is-invalid @enderror" name="employeeID" value="{{ $employee->employeeID }}"  autocomplete="employeeID">
                                @error('employeeID')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-md-4">
							     <label for="joining_position">Joining Position</label>
                                <input id="joining_position" placeholder="Joining Position" type="text" class="form-group form-control @error('joining_position') is-invalid @enderror" name="joining_position" value="{{ $employee->joining_position }}"  autocomplete="joining_position">
                                @error('joining_position')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-md-4">
                              <label for="date_of_birth"> Date of birth </label>
                                <input id="dob" type="date" class="form-group form-control @error('date_of_birth') is-invalid @enderror" name="date_of_birth" value="{{ $employee->date_of_birth }}"  autocomplete="date_of_birth">
                                @error('date_of_birth')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-md-4">
                              <label for="jobgroupid">Job Group</label>
                                <select class="browser-default custom-select" name="jobgroupid">
                                    <option value="" disabled selected>@if($employee->jobgroupid == 1) A1 @elseif($employee->jobgroupid == 2) A2 @else A3 @endif</option>
                                    <option value="1">A1</option>
                                    <option value="2">A2</option>
                                    <option value="3">A3</option>
                                </select>
                            </div>

                            <div class="col-md-4">
                              <label for="gender">Gender</label>
                                <select class="browser-default custom-select" name="gender">
                                    <option value="" disabled selected>@if($employee->gender == 'male') Male @else Female @endif</option>
                                    <option value="male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                            </div>

                            <div class="col-md-4">
                              <label for="gender">Marital Status</label>
                                <select class="browser-default custom-select" name="marital_status">
                                    <option value="" disabled selected>@if($employee->marital_status == 'married') Married @elseif($employee->marital_status == 'single') Single @elseif($employee->marital_status == 'divorced') Divorced @elseif($employee->marital_status == 'separated') Separated @else Widowed @endif</option>
                                    <option value="married">Married</option>
                                    <option value="single">Single</option>
                                    <option value="divorced">Divorced</option>
                                    <option value="separated">Separated</option>
                                    <option value="widowed">Widowed</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                              <label for="marital_status">Employee Status</label>
                                <select class="browser-default custom-select" name="employee_status">
                                    <option value="" disabled selected>@if($employee->employee_status == 'active') Active @elseif($employee->marital_status == 'suspended') Suspended @else Fired @endif</option>
                                    <option value="active">Active</option>
                                    <option value="suspended">Suspended</option>
                                    <option value="fired">Fired</option>
                                </select>
                            </div>


                            <div class="col-md-4">
                              <label for="joining_date">Joining Date </label>
                                <input id="joining_date" type="date" class="form-group form-control @error('joining_date') is-invalid @enderror" name="joining_date" value="{{ $employee->joining_date }}"  autocomplete="joining_date">
                                @error('joining_date')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                        </div>

                        <hr>
                         <h6>Spouce Details Section</h6>
                        <div class="row">
                            <div class="col-md-4">
							<label for="spouse_fname">First Name</label>
                                <input id="spouse_fname" placeholder="Spouse First Name" type="text" class="form-group form-control @error('spouse_fname') is-invalid @enderror" name="spouse_fname"  value="{{ $employee->spouse_fname }}"   autocomplete="spouse_fname">
                                @error('spouse_fname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-4">
							<label for="spouse_lname">Last Name</label>
                                <input id="spouse_lname" placeholder="Spouse Last Name" type="text" class="form-group form-control @error('spouse_lname') is-invalid @enderror" name="spouse_lname"  value="{{ $employee->spouse_lname }}"  autocomplete="spouse_lname">
                                @error('spouse_lname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-md-4">
							<label for="spouse_otherNames">Other Names</label>
                                <input id="spouse_otherNames" placeholder="Spouse Other Names" type="text" class="form-group form-control @error('spouse_otherNames') is-invalid @enderror" name="spouse_otherNames"  value="{{ $employee->spouse_otherNames }}"    autocomplete="spouse_otherNames">
                                @error('spouse_otherNames')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-md-4">
							<label for="spouse_phoneNumber">Phone Number</label>
                                <input id="spouse_phoneNumber" placeholder="Spouse Phone Number" type="text" class="form-group form-control @error('spouse_phoneNumber') is-invalid @enderror" name="spouse_phoneNumber"  value="{{ $employee->spouse_phoneNumber }}"   autocomplete="spouse_phoneNumber">
                                @error('spouse_phoneNumber')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-4">
							<label for="spouse_altphoneNumber">Alt Number</label>
                                <input id="spouse_altphoneNumber" placeholder="Spouse alt Phone Number" type="text" class="form-group form-control @error('spouse_altphoneNumber') is-invalid @enderror" name="spouse_altphoneNumber"  value="{{ $employee->spouse_altphoneNumber }}"  autocomplete="spouse_altphoneNumber">
                                @error('spouse_altphoneNumber')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-4">
							<label for="spouse_nationalId">National ID</label>
                                <input id="spouse_nationalId" placeholder="Spouse National ID" type="text" class="form-group form-control @error('spouse_nationalId') is-invalid @enderror" name="spouse_nationalId" value="{{ $employee->spouse_nationalId }}" autocomplete="spouse_nationalId">
                                @error('spouse_nationalId')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <hr>
                        <h6>Next of Kin Details Section</h6>
                        <div class="row">
                            <div class="col-md-4">
							<label for="next_of_kin_fname">First Name</label>
                                <input id="next_of_kin_fname" placeholder="Next of Kin First Name" type="text" class="form-group form-control @error('next_of_kin_fname') is-invalid @enderror" name="next_of_kin_fname"  value="{{ $employee->next_of_kin_fname }}"  autocomplete="next_of_kin_fname">
                                @error('next_of_kin_fname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-4">
							<label for="next_of_kin_lname">Last Name</label>
                                <input id="next_of_kin_lname" placeholder="Next of Kin Last Name" type="text" class="form-group form-control @error('next_of_kin_lname') is-invalid @enderror" name="next_of_kin_lname"  value="{{ $employee->next_of_kin_lname }}" autocomplete="next_of_kin_lname">
                                @error('next_of_kin_lname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-4">
							<label for="next_of_kin_otherNames">Other Names</label>
                                <input id="next_of_kin_otherNames" placeholder="Next of Kin Other Names" type="text" class="form-group form-control @error('next_of_kin_otherNames') is-invalid @enderror" name="next_of_kin_otherNames"  value="{{ $employee->next_of_kin_otherNames }}"   autocomplete="next_of_kin_otherNames">
                                @error('next_of_kin_otherNames')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-4">
							<label for="next_of_kin_phoneNumber">Phone Number</label>
                                <input id="next_of_kin_phoneNumber" placeholder="Next of Kin Phone Number" type="text" class="form-group form-control @error('next_of_kin_phoneNumber') is-invalid @enderror" name="next_of_kin_phoneNumber"  value="{{ $employee->next_of_kin_phoneNumber }}"  autocomplete="next_of_kin_phoneNumber">
                                @error('next_of_kin_phoneNumber')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-4">
							<label for="next_of_kin_altPhoneNumber">Alt Phone Number</label>
                                <input id="next_of_kin_altPhoneNumber" placeholder="Next of Kin alt Phone Number" type="text" class="form-group form-control @error('next_of_kin_altPhoneNumber') is-invalid @enderror" name="next_of_kin_altPhoneNumber" value="{{ $employee->next_of_kin_altPhoneNumber }}"   autocomplete="next_of_kin_altPhoneNumber">
                                @error('next_of_kin_altPhoneNumber')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-4">
							<label for="next_of_kin_nationalId">National ID</label>
                                <input id="next_of_kin_nationId" placeholder="Next of Kin National ID" type="text" class="form-group form-control @error('next_of_kin_nationId') is-invalid @enderror" name="next_of_kin_nationId" value="{{ $employee->next_of_kin_nationId }}"   autocomplete="next_of_kin_nationId">
                                @error('next_of_kin_nationId')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
						<hr>
						<h6>Bank Details Section</h6>
                         <div class="row">
						   <div class="col-md-4">
							<label for="bankName form-group">Bank Name</label>
                                <input id="bankName" placeholder="Bank Name" type="text" class="form-control @error('bankName') is-invalid @enderror" name="bankName" value="{{ $employee->bankName }}" autocomplete="Bank Name">
                                @error('bankName')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
							<div class="col-md-4 form-group">
							   <label for="bankBranch">Bank Branch</label>
                                <input id="bankBranch" placeholder="Bank Branch" type="text" class="form-control @error('bankBranch') is-invalid @enderror" name="bankBranch" value="{{ $employee->bankBranch }}" autocomplete="bankBranch">
                                @error('bankBranch')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
							<div class="col-md-4 form-group">
							<label for="accountNumber">Account No.</label>
                                <input id="accountNumber" placeholder="Account Number" type="text" class="form-control @error('accountNumber') is-invalid @enderror" name="accountNumber" value="{{ $employee->accountNumber }}" autocomplete="accountNumber">
                                @error('accountNumber')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
						 </div>
                          <hr>
						  <h6>Account Password</h6>
						 <div class="row">

						 <div class="col-md-6">
						     <label for="password">Password</label>
							 <input id="password" placeholder="Password" type="text" class="form-control @error('password') is-invalid @enderror" name="password" value="{{ $employee->password }}" autocomplete="password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
						 </div>
						 <div class="col-md-6">
						     <label for="password_confirmation">Confirm Password</label>
							 <input id="password_confirmation" placeholder="Confirm Password" type="text" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation" value="{{ $employee->password_confirmation }}" autocomplete="password_confirmation">
                                @error('password_confirmation')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
						 </div>
						 </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 pull-right">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Update') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
						</div>
						<!-- /Bank Statutory Tab -->

					</div>
                </div>
				<!-- /Page Content -->



            </div>
			<!-- /Page Wrapper -->


 @endsection

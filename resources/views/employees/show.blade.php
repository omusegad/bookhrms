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
								<h3 class="page-title">{{ $employee->fname }} Profile</h3>
							</div>
						</div>
					</div>
					<!-- /Page Header -->

                    <div class="row">
                        <div class="col-12">
                                    @if(session()->has('message'))
                                            <div class="alert alert-danger">
                                                <a href="#" class="close" data-dismiss="alert">&times;</a>
                                            {{session('message')}}
                                            </div>
                                    @endif
                        </div>
                    </div>

					<div class="card mb-0">
						<div class="card-body">
                            <div class="row">
                                <div class="col-lg-3">
                                    <div class="profile-img-wrap mt-3 mb-3">
                                        <div class="profile-img">
                                            @if($employee->avatar)
                                            <img  src="{{ asset('storage'.$employee->avatar) }}"  />
                                            @else
                                            <img  src="{{ asset('storage/uploads/images/account.jpg') }}"/>
                                            @endif
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
											<h4 class="card-title">Personal Informations</h4>
                                            <table class="table ">
                                                <thead>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>Employee ID</td>
                                                        <td>{{$employee->employeeID}}</td>
                                                        </tr>
                                                    <tr>
                                                    <td>Name</td>
                                                    <td>{{$employee->fname}} {{$employee->lName}} {{$employee->otherNames}} </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Gender</td>
                                                        <td> {{$employee->gender}}</td>
                                                    </tr>
                                                    <tr>
                                                    <td>Position</td>
                                                    <td> {{$employee->joining_position}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Position 2</td>
                                                        <td> {{$employee->secondPosition}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Job Group</td>
                                                        <td> {{$employee->jobgroup->jonGroupName}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Highest Education</td>
                                                        <td> {{$employee->education}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Grade</td>
                                                        <td> {{$employee->gender === 'male' ? $employee->male_pastors_grade : $employee->female_pastors_grade}}</td>
                                                    </tr>

                                                    <tr>
                                                        <td>National ID</td>
                                                        <td>{{$employee->nationalID}}</td>
                                                    </tr>

                                                    <tr>
                                                        <td>KRA PIN</td>
                                                        <td>{{$employee->pinNo}}</td>
                                                    </tr>
                                                    <tr>

                                                </tbody>
                                                </table>
										</div>
									</div>
								</div>
								<div class="col-md-6 d-flex">
									<div class="card profile-box flex-fill">
										<div class="card-body">
											<h4 class="card-title">Other Detail</h4>
                                            <table class="table ">
                                                <thead>
                                                </thead>
                                                <tbody>
                                                    <h4></h4>
                                                    <tr>
                                                    <tr>
                                                        <td>NHIF No</td>
                                                        <td>{{$employee->nhifNo}}</td>
                                                    </tr>
                                                        <tr>
                                                        <tr>
                                                            <td>NSSF No</td>
                                                            <td>{{$employee->nssfNo}}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Postal Address</td>
                                                            <td>{{$employee->postalAddress}}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Phone</td>
                                                            <td>{{$employee->phoneNumber}}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Alternative Phone</td>
                                                            <td>{{$employee->altPhoneNumber}}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Email</td>
                                                            <td> <a href="mailto:{{$employee->email}}">{{$employee->email}}</a></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Other Email</td>
                                                            <td> <a href="mailto:{{$employee->otherEmailAddress}}">{{$employee->otherEmailAddress}}</a></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Marital Status</td>
                                                            <td>{{  $employee->marital_status}}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Date of Birth</td>
                                                            <td>{{  $employee->date_of_birth}}</td>
                                                        </tr>
                                                        <tr>
                                                        <td>Commencement Date</td>
                                                        <td>{{$employee->joining_date}}</td>
                                                    </tr>
                                                </tbody>
                                                </table>
										</div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6 d-flex">
									<div class="card profile-box flex-fill">
										<div class="card-body">
											<h4 class="card-title">Spouse Details</h4>
                                            <table class="table ">
                                                <thead>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>Name : </td>
                                                        <td>{{$employee->spouse_fname}} {{$employee->spouse_lname}}</td>
                                                    </tr>
                                                <tr>
                                                    <td>Other Names : </td>
                                                    <td>{{$employee->spouse_otherNames}}</td>
                                                </tr>
                                                <tr>
                                                    <td>Phone Number : </td>
                                                    <td> {{$employee->spouse_phoneNumber}}</td>
                                                </tr>
                                                <tr>
                                                    <td>Alternative Phone Number : </td>
                                                    <td>{{$employee->spouse_altphoneNumber}}</td>
                                                </tr>
                                                <tr>
                                                    <td>National ID :</td>
                                                    <td>{{$employee->spouse_nationalId}}</td>
                                                </tr>
                                                </tbody>
                                            </table>
										</div>
									</div>
								</div>
								<div class="col-md-6 d-flex">
									<div class="card profile-box flex-fill">
										<div class="card-body">
											<h3 class="card-title">Next of Kin Details </h3>
                                            <table class="table ">
                                                <thead>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>Name : </td>
                                                        <td>{{$employee->next_of_kin_fname}} {{$employee->next_of_kin_lname}}</td>
                                                    </tr>
                                                <tr>
                                                    <td>Other Names : </td>
                                                    <td>{{$employee->next_of_kin_otherNames}}</td>
                                                </tr>
                                                <tr>
                                                    <td>Phone Number : </td>
                                                    <td> {{$employee->next_of_kin_phoneNumber}}</td>
                                                </tr>
                                                <tr>
                                                    <td>Alternative Phone Number : </td>
                                                    <td>{{$employee->next_of_kin_altPhoneNumber}}</td>
                                                </tr>
                                                <tr>
                                                    <td>National ID :</td>
                                                    <td>{{$employee->next_of_kin_nationalId}}</td>
                                                </tr>
                                                <tr>
                                                    <td>Relationship :</td>
                                                    <td>{{$employee->next_of_kin_relationship}}</td>
                                                </tr>
                                                </tbody>
                                            </table>


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
                    <!-- Only fields withe errors are to be validated -->
                    <form method="POST" action="{{ route('employees-profile.update',  Auth::user()->id) }}">
                        {{ method_field('PUT') }}
                        @csrf
                        <div class="row">
                            <div class="col-md-4">
					      		<label for="otherName">Other Names*</label>
                                <input id="name" placeholder="Other Names" type="text" class="form-control @error('otherNames') is-invalid @enderror" name="otherNames" value="{{ $employee->otherNames }}"  autocomplete="otherNames">
                                @error('otherNames')
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
                                <input id="emergencyPhoneNumber" placeholder="Emergency Phone No" type="text" class="form-group form-control @error('emergency_contact') is-invalid @enderror" name="emergency_contact"  value="{{ $employee->emergencyPhoneNumber }}"  autocomplete="emergencyPhoneNumber">
                                @error('emergency_contact')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-md-4">
							    <label for="present_residence">Current Residence</label>
                                <input id="present_residence" placeholder="Current Residence" type="text" class="form-group form-control @error('present_residence') is-invalid @enderror" name="present_residence" value="{{ $employee->current_address }}"   autocomplete="present_residence">
                                @error('present_residence')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-4">
							     <label for="permanent_residenec">Permanent Residence</label>
                                <input id="permanent_address" placeholder="Permanent Residence" type="text" class="form-group form-control @error('permanent_residence') is-invalid @enderror" name="permanent_residence" value="{{ $employee->permanent_address }}"   autocomplete="permanent_residence">
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
                        </div>

                        <hr>
						 <div class="row">
                                <div class="col-md-6">
                                    <label for="password">Change your password</label>
                                    <input id="password" placeholder="Password" type="password" class="form-control @error('password') is-invalid @enderror" name="newpassword" autocomplete="password">
                                        @error('newpassword')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                </div>
                                <div class="col-md-6 text-right mt-4">
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

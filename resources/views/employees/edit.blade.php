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
                <h3 class="page-title">Employee</h3>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                    <li class="breadcrumb-item active">Edit Employee</li>
                </ul>
            </div>
            <div class="col-auto float-right ml-auto">
                <a href="{{ url('/employees') }}" class="btn add-btn"><i class="fa fa-eye"></i> View Employees</a>
                <div class="view-icons">
                     <a href="#" class="grid-view btn btn-link"><i class="fa fa-th"></i></a>
                     <a href="#" class="list-view btn btn-link active"><i class="fa fa-bars"></i></a>
                </div>
           </div>
        </div>
    </div>
    <!-- /Page Header -->
                

    <div class="row mt-5 justify-content-center">
        <div class="col-md-12">
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
                    <form method="POST" action="{{ route('employee.edit') }}">
                        @csrf
                        <input type="hidden" name="ids" value="{{ $employee->id }}">
                        <div class="row">
                            <div class="col-md-4">
                                <input id="fName" placeholder="First Name" type="text" class="form-group form-control @error('fName') is-invalid @enderror" name="fName" value="{{ $employee->fName }}"  autocomplete="fName" autofocus>
                                @error('fName')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <input id="lName" placeholder="Last Name" type="text" class="form-control @error('lName') is-invalid @enderror" name="lName" value="{{ $employee->lName }}"  autocomplete="lName" autofocus>
                                @error('lName')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <input id="name" placeholder="Other Names" type="text" class="form-control @error('otherNames') is-invalid @enderror" name="otherNames" value="{{ $employee->otherNames }}"  autocomplete="otherNames" autofocus>
                                @error('otherNames')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                          
                            <div class="col-md-4">
                                <input id="email" placeholder="Email" type="email" class="form-group form-control @error('email') is-invalid @enderror" name="email" value="{{ $employee->email }}"  autocomplete="email">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        
                            <div class="col-md-4">
                                <input id="phonenumber" placeholder="Phone Number" type="text" class="form-group form-control @error('phoneNumber') is-invalid @enderror" name="phoneNumber" value="{{ $employee->phoneNumber }}"    autocomplete="phoneNumber">
                                @error('phoneNumber')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-md-4">
                                <input id="altPhoneNumber" placeholder="Alt Phone Number" type="text" class="form-group form-control @error('altPhoneNumber') is-invalid @enderror" name="altPhoneNumber"  value="{{ $employee->altPhoneNumber }}" autocomplete="altPhoneNumber">
                                @error('altPhoneNumber')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-md-4">
                                <input id="emergencyPhoneNumber" placeholder="Emergency Phone No" type="text" class="form-group form-control @error('emergency_contact') is-invalid @enderror" name="emergency_contact"  value="{{ $employee->emergency_contact }}"  autocomplete="emergencyPhoneNumber">
                                @error('emergency_contact')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                           
                            <div class="col-md-4">
                                <input id="nhifNo" placeholder="NHIF" type="text" class="form-group form-control @error('nhifNo') is-invalid @enderror" name="nhifNo"  value="{{ $employee->nhifNo }}"   autocomplete="nhifNo">
                                @error('nhifNo')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-md-4">
                                <input id="nssfNo" placeholder="NSSF" type="text" class="form-group form-control @error('nssfNo') is-invalid @enderror" name="nssfNo" value="{{ $employee->nssfNo }}"   autocomplete="nssfNo">
                                @error('nssfNo')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-md-4">
                                <input id="nationalID" placeholder="National ID" type="text" class="form-group form-control @error('nationalID') is-invalid @enderror" name="nationalID"  value="{{ $employee->nationalID }}"   autocomplete="nationalID">
                                @error('nationalID')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-md-4">
                                <input id="present_residence" placeholder="Current Residence" type="text" class="form-group form-control @error('present_residence') is-invalid @enderror" name="present_residence" value="{{ $employee->present_residence }}"   autocomplete="present_residence">
                                @error('present_residence')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <input id="permanent_residence" placeholder="Permanent Residence" type="text" class="form-group form-control @error('permanent_residence') is-invalid @enderror" name="permanent_residence" value="{{ $employee->permanent_residence }}"   autocomplete="permanent_residence">
                                @error('permanent_residence')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <input id="home_county" placeholder="Home County" type="text" class="form-group form-control @error('home_county') is-invalid @enderror" name="home_county" value="{{ $employee->home_county }}"   autocomplete="home_county">
                                @error('home_county')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-md-4">
                                <input id="employeeID" placeholder="Employee ID" type="text" class="form-group form-control @error('employeeID') is-invalid @enderror" name="employeeID" value="{{ $employee->employeeID }}"  autocomplete="employeeID">
                                @error('employeeID')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-md-4">
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
                                <input id="spouse_fname" placeholder="Spouse First Name" type="text" class="form-group form-control @error('spouse_fname') is-invalid @enderror" name="spouse_fname"  value="{{ $employee->spouse_fname }}"   autocomplete="spouse_fname">
                                @error('spouse_fname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <input id="spouse_lname" placeholder="Spouse Last Name" type="text" class="form-group form-control @error('spouse_lname') is-invalid @enderror" name="spouse_lname"  value="{{ $employee->spouse_lname }}"  autocomplete="spouse_lname">
                                @error('spouse_lname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-md-4">
                                <input id="spouse_otherNames" placeholder="Spouse Other Names" type="text" class="form-group form-control @error('spouse_otherNames') is-invalid @enderror" name="spouse_otherNames"  value="{{ $employee->spouse_otherNames }}"    autocomplete="spouse_otherNames">
                                @error('spouse_otherNames')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-md-4">
                                <input id="spouse_phoneNumber" placeholder="Spouse Phone Number" type="text" class="form-group form-control @error('spouse_phoneNumber') is-invalid @enderror" name="spouse_phoneNumber"  value="{{ $employee->spouse_phoneNumber }}"   autocomplete="spouse_phoneNumber">
                                @error('spouse_phoneNumber')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <input id="spouse_altphoneNumber" placeholder="Spouse alt Phone Number" type="text" class="form-group form-control @error('spouse_altphoneNumber') is-invalid @enderror" name="spouse_altphoneNumber"  value="{{ $employee->spouse_altphoneNumber }}"  autocomplete="spouse_altphoneNumber">
                                @error('spouse_altphoneNumber')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-4">
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
                                <input id="next_of_kin_fname" placeholder="Next of Kin First Name" type="text" class="form-group form-control @error('next_of_kin_fname') is-invalid @enderror" name="next_of_kin_fname"  value="{{ $employee->next_of_kin_fname }}"  autocomplete="next_of_kin_fname">
                                @error('next_of_kin_fname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <input id="next_of_kin_lname" placeholder="Next of Kin Last Name" type="text" class="form-group form-control @error('next_of_kin_lname') is-invalid @enderror" name="next_of_kin_lname"  value="{{ $employee->next_of_kin_lname }}" autocomplete="next_of_kin_lname">
                                @error('next_of_kin_lname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <input id="next_of_kin_otherNames" placeholder="Next of Kin Other Names" type="text" class="form-group form-control @error('next_of_kin_otherNames') is-invalid @enderror" name="next_of_kin_otherNames"  value="{{ $employee->next_of_kin_otherNames }}"   autocomplete="next_of_kin_otherNames">
                                @error('next_of_kin_otherNames')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <input id="next_of_kin_phoneNumber" placeholder="Next of Kin Phone Number" type="text" class="form-group form-control @error('next_of_kin_phoneNumber') is-invalid @enderror" name="next_of_kin_phoneNumber"  value="{{ $employee->next_of_kin_phoneNumber }}"  autocomplete="next_of_kin_phoneNumber">
                                @error('next_of_kin_phoneNumber')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <input id="next_of_kin_altPhoneNumber" placeholder="Next of Kin alt Phone Number" type="text" class="form-group form-control @error('next_of_kin_altPhoneNumber') is-invalid @enderror" name="next_of_kin_altPhoneNumber" value="{{ $employee->next_of_kin_altPhoneNumber }}"   autocomplete="next_of_kin_altPhoneNumber">
                                @error('next_of_kin_altPhoneNumber')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <input id="next_of_kin_nationId" placeholder="Next of Kin National ID" type="text" class="form-group form-control @error('next_of_kin_nationId') is-invalid @enderror" name="next_of_kin_nationId" value="{{ $employee->next_of_kin_nationId }}"   autocomplete="next_of_kin_nationId">
                                @error('next_of_kin_nationId')
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
    </div>

                
               

            </div>
            <!-- /Page Content -->
            
          
           
            
            
        </div>
        <!-- /Page Wrapper -->
 @endsection
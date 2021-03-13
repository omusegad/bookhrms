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
                <h3 class="page-title">Edit  '{{  $employee->fname }}' Profile</h3>
            </div>
            <div class="col-auto float-right ml-auto">
                <a href="{{ url('/employees') }}" class="btn add-btn"><i class="fa fa-eye"></i> All Employees</a>
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
                      {{session('message')}}
                    </div>
                    @endif
                    <!-- Only fields withe errors are to be validated -->
                    <form method="POST" action="{{ route('employees.update', $employee->id) }}"  enctype="multipart/form-data">
                        {{ method_field('PUT') }}
                        @csrf
                        <div class="row">
                            <div class="col-lg-8">
                                <div class="row">
                                <div class="col-md-6">
                                    <label for="">Employee ID</label>
                                    <input id="employeeID" type="text" class="form-group form-control @error('employeeID') is-invalid @enderror" name="employeeID" value="{{ $employee->employeeID }}"  autocomplete="employeeID" required>
                                    @error('employeeID')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="">First Name</label>
                                    <input id="fname"  type="text" class="form-group form-control @error('fname') is-invalid @enderror" name="fname"  value="{{ $employee->fname ? $employee->fname :  old('fname') }}"  autocomplete="fname" autofocus>
                                    @error('fname')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="">Surname</label>
                                    <input id="lName" type="text" class="form-group  form-control @error('lName') is-invalid @enderror" name="lName" value="{{ $employee->lName ?  $employee->lName  :  old('lName')}}"  autocomplete="lName" autofocus>
                                    @error('lName')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="">Other Names</label>
                                    <input id="name"  type="text" class="form-group  form-control @error('otherNames') is-invalid @enderror" name="otherNames"  value="{{ $employee->otherNames ? $employee->otherNames : old('otherNames')  }}"  autocomplete="otherNames" autofocus>
                                    @error('otherNames')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="">Highest  Education</label>
                                    <input id="education"  type="text" class="form-group  form-control @error('education') is-invalid @enderror" name="education"  value="{{ $employee->education ? $employee->education : old('education')  }}"  autocomplete="education" autofocus>
                                    @error('education')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="">National ID</label>
                                    <input id="nationalID"  type="text" class="form-group form-control @error('nationalID') is-invalid @enderror" name="nationalID"  value="{{ $employee->nationalID ? $employee->nationalID : old('nationalID')   }}"   autocomplete="nationalID">
                                    @error('nationalID')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                           </div>
                           <div class="col-lg-4">
                            <div class="preview text-center">
                                @if($employee->avatar)
                                <img class="preview-img rounded-circle" src="{{ asset('storage'.$employee->avatar) }}"  width="150" height="150"/>
                               @else
                                <img class="preview-img rounded-circle" src="{{ asset('storage/uploads/images/account.jpg') }}"  width="150" height="150"/>
                               @endif
                                <div class="browse-button">
                                    <i class="fa fa-pencil m-r-5"></i>
                                    <input class="browse-input" type="file" name="profile_image" id="UploadedFile"/>
                                </div>
                                @error('profile_image')
                                    <span class="invalid-feedback" role="alert">
                                         <strong>{{ $message }}</strong>
                                    </span>
                               @enderror
                               <div class="mpt-3">Upload Photo </div>
                            </div>
                        </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <label for="">Email</label>
                                <input id="email" type="email" class="form-group form-control @error('email') is-invalid @enderror" name="email" value="{{ $employee->email ?  $employee->email : old('email') }}"  autocomplete="email">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-md-4">
                                <label for="">Other Email Addreess </label>
                                <input id="otherEmailAddress"  type="text" class="form-group form-control @error('otherEmailAddress') is-invalid @enderror" name="otherEmailAddress" value="{{ $employee->otherEmailAddress ? $employee->otherEmailAddress :  old('otherEmailAddress')}}"   autocomplete="otherEmailAddress">
                                @error('otherEmailAddress')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-md-4">
                                <label for="">Phone Number</label>
                                <input id="phonenumber"  type="text" class="form-group form-control @error('phoneNumber') is-invalid @enderror" name="phoneNumber" value="{{ $employee->phoneNumber ? $employee->phoneNumber : old('phoneNumber')   }}"    autocomplete="phoneNumber" >
                                @error('phoneNumber')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-md-4">
                                <label for="">Alternative Phone Number</label>
                                <input id="altPhoneNumber"  type="text" class="form-group form-control @error('altPhoneNumber') is-invalid @enderror" name="altPhoneNumber"  value="{{ $employee->altPhoneNumber ?  $employee->altPhoneNumber : old('altPhoneNumber') }}" autocomplete="altPhoneNumber">
                                @error('altPhoneNumber')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-md-4">
                                <label for="">NHIF</label>
                                <input id="nhifNo"  type="text" class="form-group form-control @error('nhifNo') is-invalid @enderror" name="nhifNo"  value="{{ $employee->nhifNo ?  $employee->nhifNo :  old('emergency_contact') }}"   autocomplete="nhifNo" >
                                @error('nhifNo')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-md-4">
                                <label for="">NSSF</label>
                                <input id="nssfNo"  type="text" class="form-group form-control @error('nssfNo') is-invalid @enderror" name="nssfNo" value="{{ $employee->nssfNo ?  $employee->nssfNo : old('nssfNo')  }}"   autocomplete="nssfNo">
                                @error('nssfNo')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-md-4">
                                <label for="">KRA PIN</label>
                                <input   type="text" class="form-group form-control @error('pinNo') is-invalid @enderror" name="pinNo" value="{{ $employee->pinNo ?  $employee->pinNo : old('pinNo')  }}"   autocomplete="pinNo">
                                @error('pinNo')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-md-4">
                                <label for="">Postal Address</label>
                                <input   type="text" class="form-group form-control @error('postalAddress') is-invalid @enderror" name="postalAddress" value="{{ $employee->postalAddress ?  $employee->postalAddress : old('postalAddress')  }}"   autocomplete="postalAddress">
                                @error('postalAddress')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-md-4">
                                <label for="">Home Area</label>
                                <input id="home_county"  type="text" class="form-group form-control @error('home_county') is-invalid @enderror" name="home_county" value="{{ $employee->home_county ?  $employee->home_county : old('home_county')  }}"   autocomplete="home_county">
                                @error('home_county')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            @if($employee->gender == "male")
                               <div class="col-lg-4">
                                    <label for="gender">{{ $employee->fname }} 's Grade</label>
                                    <select class="browser-default custom-select" name="male_pastors_grade">
                                        @if($employee->male_pastors_grade)
                                            <option value="{{ $employee->male_pastors_grade }}" disabled>{{ $employee->male_pastors_grade }} </option>
                                            <option value="unlicensed">unlicensed</option>
                                            <option value="ordained">ordained</option>
                                        @endif
                                        @if($employee->male_pastors_grade == null)
                                        <option value="">Choose Grade Option</option>
                                        <option value="licensed">licensed</option>
                                        <option value="unlicensed">unlicensed</option>
                                        <option value="ordained">ordained</option>
                                    @endif
                                    </select>
                            </div>
                        @elseif($employee->gender == "female")
                            <div class="col-lg-4">
                                <label for="gender"> {{ $employee->fname }}'s Grade</label>
                                <select class="browser-default custom-select" name="female_pastors_grade">
                                    @if($employee->female_pastors_grade === "oneToFive")
                                        <option value="oneToFive">1 -5 years experience</option>
                                        <option value="sixToTen">6 - 10 Years Experience</option>
                                        <option value="elevenAndAbove">11 and Above Years Experience</option>

                                        @elseif($employee->female_pastors_grade === "sixToTen")
                                        <option value="sixToTen">6 - 10 years experience </option>
                                        <option value="oneToFive">1 - 5 Years Experience</option>
                                        <option value="elevenAndAbove">11 and Above Years Experience</option>

                                        @elseif($employee->female_pastors_grade === "elevenAndAbove")
                                        <option value="elevenAndAbove"> 11 and above years experience</option>
                                        <option value="oneToFive">1 - 5 Years Experience</option>
                                        <option value="sixToTen"> 6 - 10 Years Experience</option>
                                        @elseif($employee->female_pastors_grade === null)
                                        <option value="" > Choose Years Experience</option>
                                        <option value="oneToFive">1 - 5 Years Experience</option>
                                        <option value="sixToTen"> 6 - 10 Years Experience</option>
                                        <option value="elevenAndAbove"> 11 and above years experience</option>
                                        @endif
                                </select>
                            </div>
                        @endif

                        <div class="col-md-4">
                            <label for="aic_jobgroups_id">Job Group</label>
                            <select class="browser-default custom-select" name="aic_jobgroups_id">
                              <option  value="{{ $employee->jobgroup['id'] }}" >{{ $employee->jobgroup['jonGroupName'] }}</option>
                                  @foreach ($jgroup as $item)
                                      @if( $item->jonGroupName == $employee->jobgroup['jonGroupName'] )
                                      <option  class="d-none" disabled="disabled"  value="{{ $item->id }}">{{  $item->jonGroupName  }}</option>
                                      @else
                                          <option value="{{ $item->id }}">{{ $item->jonGroupName  }}</option>
                                      @endif
                                  @endforeach
                              </select>
                          </div>

                          <div class="col-md-4">
                              <label for="gender">Gender</label>
                              <select class="browser-default custom-select" name="gender">
                                  @if($employee->gender === "male")
                                  <option value="{{ $employee->gender  }}">{{ $employee->gender  }}</option>
                                  <option value="female">Female</option>
                                      @elseif($employee->gender === "female")
                                          <option value="{{ $employee->gender  }}">{{ $employee->gender  }}</option>
                                          <option value="male">Male</option>
                                      @else
                                          <option value="female">Female</option>
                                          <option value="male">Male</option>
                                      @endif
                              </select>
                          </div>

                          <div class="col-md-4">
                            <label for="gender">Marital Status</label>
                              <select class="browser-default custom-select" name="marital_status">
                                       @if($employee->marital_status === "married")
                                           <option value="single">{{ $employee->marital_status  }}</option>
                                          <option value="single">Single</option>
                                          <option value="divorced">Divorced</option>
                                          <option value="separated">Separated</option>
                                          <option value="widowed">Widowed</option>
                                       @elseif($employee->marital_status === "single")
                                            <option value="single">{{ $employee->marital_status  }}</option>
                                             <option value="married">Married</option>
                                             <option value="divorced">Divorced</option>
                                             <option value="separated">Separated</option>
                                            <option value="widowed">Widowed</option>
                                       @elseif($employee->marital_status === "divorced")
                                           <option value="single">{{ $employee->marital_status  }}</option>
                                          <option value="single">Single</option>
                                          <option value="divorced">Divorced</option>
                                          <option value="separated">Separated</option>
                                          <option value="widowed">Widowed</option>
                                       @elseif($employee->marital_status === "seperated")
                                       <option value="single">{{ $employee->marital_status  }}</option>
                                          <option value="single">Single</option>
                                          <option value="divorced">Divorced</option>
                                          <option value="separated">Separated</option>
                                          <option value="widowed">Widowed</option>
                                       @elseif($employee->marital_status === "widowed")
                                       <option value="single">{{ $employee->marital_status  }}</option>
                                          <option value="married">Married</option>
                                          <option value="single">Single</option>
                                          <option value="divorced">Divorced</option>
                                          <option value="separated">Separated</option>
                                      @else
                                      <option value="married">Married</option>
                                      <option value="single">Single</option>
                                      <option value="divorced">Divorced</option>
                                      <option value="separated">Separated</option>
                                      <option value="widowed">Widowed</option>
                                       @endif
                              </select>
                          </div>


                          <div class="col-md-4">
                              <label for="employee_type">Employee Type</label>
                                <select class="browser-default custom-select" name="employee_type">

                                      @if($employee->employee_type === "HQ")
                                         <option value="{{ $employee->employee_type  }}">{{ $employee->employee_type  }}</option>
                                         <option value="FIELD">FIELD</option>

                                      @elseif($employee->employee_type === "FIELD")
                                      <option value="{{ $employee->employee_type  }}">{{ $employee->employee_type  }}</option>
                                         <option value="HQ">HQ</option>
                                      @endif

                                </select>
                            </div>
                          <div class="col-md-4">
                            <label for="marital_status">Employee Status</label>
                              <select class="browser-default custom-select" name="employee_status">
                                   @if($employee->employee_status === "active")
                                          <option value="active">{{ $employee->employee_status  }}</option>
                                          <option value="suspended">Suspended</option>
                                          <option value="fired">Fired</option>
                                          <option value="OnIndescipline">Indescipline</option>
                                          <option value="Onleave">On leave</option>
                                      @elseif($employee->employee_status === "suspended")
                                          <option value="suspended">{{ $employee->employee_status  }}</option>
                                          <option value="active">Active</option>
                                          <option value="fired">Fired</option>
                                          <option value="OnIndescipline">Indescipline</option>
                                          <option value="Onleave">On leave</option>
                                      @elseif($employee->employee_status === "fired")
                                          <option value="fired">{{ $employee->employee_status  }}</option>
                                          <option value="suspended">Suspended</option>
                                          <option value="active">Active</option>
                                          <option value="OnIndescipline">Indescipline</option>
                                          <option value="Onleave">On leave</option>
                                    @elseif($employee->employee_status === "OnIndescipline")
                                          <option value="fired">{{ $employee->employee_status  }}</option>
                                          <option value="suspended">Suspended</option>
                                          <option value="fired">Fired</option>
                                          <option value="active">Active</option>
                                          <option value="Onleave">On leave</option>
                                          @elseif($employee->employee_status === "Onleave")
                                          <option value="fired">{{ $employee->employee_status  }}</option>
                                          <option value="suspended">Suspended</option>
                                          <option value="fired">Fired</option>
                                          <option value="active">Active</option>
                                          <option value="OnIndescipline">Indescipline</option>
                                      @endif
                              </select>
                          </div>

                          <div class="col-md-4">
                            <label for="joining_date">commencement Date </label>
                              <input id="joining_date" type="date" class="form-group form-control @error('joining_date') is-invalid @enderror" name="joining_date" value="{{ $employee->joining_date ? $employee->joining_date : old('joining_date')  }}"  autocomplete="joining_date">
                              @error('joining_date')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                              @enderror
                          </div>

                            <div class="col-md-4">
                                <label for="date_of_birth"> Date of birth </label>
                                  <input id="dob" type="date" class="form-group form-control @error('date_of_birth') is-invalid @enderror" name="date_of_birth" value="{{ $employee->date_of_birth ?  $employee->date_of_birth : old('joining_position') }}"  autocomplete="date_of_birth">
                                  @error('date_of_birth')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                  @enderror
                              </div>

                              <div class="col-md-4">
                                  <label for="">Position</label>
                                <input id="joining_position"  type="text" class="form-group form-control @error('joining_position') is-invalid @enderror" name="joining_position" value="{{ $employee->joining_position }}"  autocomplete="joining_position">
                                @error('joining_position')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label for="">Second Position</label>
                              <input id="secondPosition" type="text" class="form-group form-control @error('secondPosition') is-invalid @enderror" name="secondPosition" value="{{ $employee->secondPosition }}"  autocomplete="secondPosition">
                              @error('secondPosition')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                              @enderror
                          </div>



                              <div class="col-md-4">
                                <label for="d">Department  </label>
                                  <input id="department" type="text" class="form-group form-control @error('department') is-invalid @enderror" name="department" value="{{ $employee->department ? $employee->department : old('department')  }}"  autocomplete="department">
                                  @error('department')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                  @enderror
                              </div>


                        </div>
                            <h4> Regions Section</h4>
                        <hr>
                        <div class="row mb-3">
                            <div class="col-md-4">
                                <label for="aic_regions_id">AIC Region</label>
                                <select class="browser-default custom-select" name="aic_regions_id">
                                    <option  value="{{ $employee->region['id'] }}" > {{ $employee->region['rName'] }} </option>
                                      @foreach ($regions as $item)
                                        @if( $item->rName ==  $employee->region['rName'] )
                                           <option  class="d-none" disabled="disabled"  value="{{ $item->id }}">{{   $employee->region['rName']  }}</option>
                                        @else
                                             <option value="{{ $item->id }}">{{  $item->rName }}</option>
                                        @endif
                                      @endforeach
                                  </select>
                            </div>


                            <div class="col-md-4">
                                <label for="aic_dccs_id">DCC</label>
                                <select class="browser-default custom-select" name="aic_dccs_id">
                                    <option  value="{{ $employee->dcc['id'] }}" >{{ $employee->dcc['dccName'] }}</option>
                                      @foreach ($dcc as $item)
                                        @if( $item->dccName ==  $employee->dcc['dccName'] )
                                        <option  class="d-none" disabled="disabled"  value="{{ $item->id }}">{{   $employee->dcc['dccName']  }}</option>
                                        @else
                                            <option value="{{ $item->id }}">{{  $item->dccName  }}</option>
                                        @endif
                                      @endforeach
                                  </select>
                            </div>

                            <div class="col-md-4">
                                <label for="aic_lccs_id">LCC</label>
                                <select class="browser-default custom-select" name="aic_lccs_id">
                                    <option  value="{{ $employee->lcc['id'] }}" >{{ $employee->lcc['lccName'] }}</option>
                                      @foreach ($lcc as $item)
                                            @if( $item->lccName ==  $employee->lcc['lccName'] )
                                            <option  class="d-none" disabled="disabled"  value="{{ $item->id }}">{{   $employee->lcc['lccName']  }}</option>
                                            @else
                                                <option value="{{ $item->id }}">{{  $item->lccName  }}</option>
                                            @endif
                                      @endforeach
                                  </select>
                            </div>
                        </div>

                        <br>
                         <h4>Spouse Details Section</h4>
                         <hr>
                        <div class="row">
                            <div class="col-md-4">
                                <label for="">Spouse First Name</label>
                                <input id="spouse_fname"type="text" class="form-group form-control @error('spouse_fname') is-invalid @enderror" name="spouse_fname"  value="{{ $employee->spouse_fname ? $employee->spouse_fname : old('spouse_fname')}}"   autocomplete="spouse_fname">
                                @error('spouse_fname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label for="">Spouse Last Name</label>
                                <input id="spouse_lname" type="text" class="form-group form-control @error('spouse_lname') is-invalid @enderror" name="spouse_lname"  value="{{ $employee->spouse_lname ? $employee->spouse_lname  : old('spouse_lname') }}"  autocomplete="spouse_lname">
                                @error('spouse_lname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-md-4">
                                <label for="">Spouse Other Name</label>
                                <input id="spouse_otherNames"  type="text" class="form-group form-control @error('spouse_otherNames') is-invalid @enderror" name="spouse_otherNames"  value="{{ $employee->spouse_otherNames ? $employee->spouse_otherNames : old('spouse_otherNames') }}"    autocomplete="spouse_otherNames">
                                @error('spouse_otherNames')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-md-4">
                                <label for="">Spouse Phone Number</label>
                                <input id="spouse_phoneNumber"  type="text" class="form-group form-control @error('spouse_phoneNumber') is-invalid @enderror" name="spouse_phoneNumber"  value="{{ $employee->spouse_phoneNumber ? $employee->spouse_phoneNumber  : old('spouse_phoneNumber') }}"   autocomplete="spouse_phoneNumber">
                                @error('spouse_phoneNumber')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-md-4">
                                <label for="">Spouse Alternative Phone Number </label>
                                <input id="spouse_altphoneNumber"  type="text" class="form-group form-control @error('spouse_altphoneNumber') is-invalid @enderror" name="spouse_altphoneNumber"  value="{{ $employee->spouse_altphoneNumber ? $employee->spouse_altphoneNumber : old('spouse_altphoneNumber') }}"  autocomplete="spouse_altphoneNumber">
                                @error('spouse_altphoneNumber')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label for="">Spouse National  ID</label>
                                <input id="spouse_nationalId" type="text" class="form-group form-control @error('spouse_nationalId') is-invalid @enderror" name="spouse_nationalId" value="{{ $employee->spouse_nationalId ?  $employee->spouse_nationalId : old('spouse_nationalId') }}" autocomplete="spouse_nationalId">
                                @error('spouse_nationalId')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <br>
                        <h4>Next of Kin Details Section</h4>
                        <hr>
                        <div class="row">
                            <div class="col-md-4">
                                <label for="">Next of Kin First Name </label>
                                <input id="next_of_Kin_fname"  type="text" class="form-group form-control @error('next_of_Kin_fname') is-invalid @enderror" name="next_of_Kin_fname"  value="{{ $employee->next_of_Kin_fname ? $employee->next_of_Kin_fname  : old('next_of_Kin_fname')}}"  autocomplete="next_of_Kin_fname">
                                @error('next_of_Kin_fname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label for="">Next of Kin Last Name  </label>
                                <input id="next_of_Kin_lname"  type="text" class="form-group form-control @error('next_of_Kin_lname') is-invalid @enderror" name="next_of_Kin_lname"  value="{{ $employee->next_of_Kin_lname ?  $employee->next_of_Kin_lname : old('next_of_Kin_lname')  }}" autocomplete="next_of_Kin_lname">
                                @error('next_of_Kin_lname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label for="">Next of Kin Other Names</label>
                                <input id="next_of_Kin_otherNames" type="text" class="form-group form-control @error('next_of_Kin_otherNames') is-invalid @enderror" name="next_of_Kin_otherNames"  value="{{ $employee->next_of_Kin_otherNames ?  $employee->next_of_Kin_otherNames : old('next_of_Kin_otherNames')  }}"   autocomplete="next_of_Kin_otherNames">
                                @error('next_of_Kin_otherNames')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label for="">Next of Kin Phone Number</label>
                                <input id="next_of_Kin_phoneNumber"  type="text" class="form-group form-control @error('next_of_Kin_phoneNumber') is-invalid @enderror" name="next_of_Kin_phoneNumber"  value="{{ $employee->next_of_Kin_phoneNumber ? $employee->next_of_Kin_phoneNumber : old('next_of_Kin_phoneNumber')  }}"  autocomplete="next_of_Kin_phoneNumber">
                                @error('next_of_Kin_phoneNumber')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label for=""> Next of Kin Alternative Phone Number </label>
                                <input id="next_of_Kin_altPhoneNumber"  type="text" class="form-group form-control @error('next_of_Kin_altPhoneNumber') is-invalid @enderror" name="next_of_Kin_altPhoneNumber" value="{{ $employee->next_of_Kin_altPhoneNumber ? $employee->next_of_Kin_altPhoneNumber : old('next_of_Kin_altPhoneNumber') }}"   autocomplete="next_of_Kin_altPhoneNumber">
                                @error('next_of_Kin_altPhoneNumber')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label for="">Next of Kin National ID</label>
                                <input id="next_of_Kin_nationId"  type="text" class="form-group form-control @error('next_of_Kin_nationId') is-invalid @enderror" name="next_of_Kin_nationId" value="{{ $employee->next_of_Kin_nationId ? $employee->next_of_Kin_nationId : old('next_of_Kin_nationId')  }}"   autocomplete="next_of_Kin_nationId">
                                @error('next_of_Kin_nationId')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label for=""> Next of Kin Relationship </label>
                                <input id="next_of_Kin_relationship"  type="text" class="form-group form-control @error('next_of_Kin_relationship') is-invalid @enderror" name="next_of_Kin_relationship" value="{{ $employee->next_of_Kin_relationship ? $employee->next_of_Kin_relationship :  old('next_of_Kin_relationship')}}"   autocomplete="next_of_Kin_relationship">
                                @error('next_of_Kin_relationship')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    <div class="clearfix"></div>
                    <hr>
                    <div class="row">
                                <div class="col-md-5">
                                    <label for="">Exit Date</label>
                                    <input id="exit_date"  type="date" class="form-group form-control @error('exit_date') is-invalid @enderror" name="exit_date" value="{{ $employee->exit_date ? $employee->exit_date :  old('exit_date')}}"   autocomplete="exit_date">
                                    @error('exit_date')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-md-5">
                                    <label for="password">Change  password</label>
                                    <input id="password" placeholder="Password" type="password" class="form-control @error('password') is-invalid @enderror" name="newpassword" autocomplete="password">
                                        @error('newPassword')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                </div>
                                <div class="col-md-2 text-center mt-4">
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

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
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Edit Employee</li>
                </ul>
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
                                    <input id="employeeID" placeholder="Employee ID" type="text" class="form-group form-control @error('employeeID') is-invalid @enderror" name="employeeID" value="{{ $employee->employeeID }}"  autocomplete="employeeID">
                                    @error('employeeID')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <input id="fname" placeholder="First Name" type="text" class="form-group form-control @error('fname') is-invalid @enderror" name="fname"  value="{{ $employee->fname ? $employee->fname :  old('fname') }}"  autocomplete="fname" autofocus>
                                    @error('fname')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <input id="lName" placeholder="Last Name" type="text" class="form-group  form-control @error('lName') is-invalid @enderror" name="lName" value="{{ $employee->lName ?  $employee->lName  :  old('lName')}}"  autocomplete="lName" autofocus>
                                    @error('lName')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <input id="name" placeholder="Other Names" type="text" class="form-group  form-control @error('otherNames') is-invalid @enderror" name="otherNames"  value="{{ $employee->otherNames ? $employee->otherNames : old('otherNames')  }}"  autocomplete="otherNames" autofocus>
                                    @error('otherNames')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <input id="education" placeholder="Education" type="text" class="form-group  form-control @error('education') is-invalid @enderror" name="education"  value="{{ $employee->education ? $employee->education : old('education')  }}"  autocomplete="education" autofocus>
                                    @error('education')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <input id="nationalID" placeholder="National ID" type="text" class="form-group form-control @error('nationalID') is-invalid @enderror" name="nationalID"  value="{{ $employee->nationalID ? $employee->nationalID : old('nationalID')   }}"   autocomplete="nationalID">
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
                                <img class="preview-img rounded-circle" src="{{ asset('storage/uploads/images/account.png') }}"  width="150" height="150"/>
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
                            </div>
                        </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <input id="father_name" placeholder="Fathers Full Name" type="text" class="form-group form-control @error('father_name') is-invalid @enderror" name="father_name"  value="{{ $employee->father_name ? $employee->father_name : old('father_name')   }}"   autocomplete="father_name">
                                @error('father_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-md-4">
                                <input id="mother_name" placeholder="Mother Full Name" type="text" class="form-group form-control @error('mother_name') is-invalid @enderror" name="mother_name"  value="{{ $employee->mother_name ? $employee->mother_name : old('mother_name')   }}"   autocomplete="mother_name">
                                @error('mother_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-md-4">
                                <input id="email" placeholder="Email" type="email" class="form-group form-control @error('email') is-invalid @enderror" name="email" value="{{ $employee->email ?  $employee->email : old('email') }}"  autocomplete="email">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-md-4">
                                <input id="otherEmailAddress" placeholder="Other Email Address" type="text" class="form-group form-control @error('otherEmailAddress') is-invalid @enderror" name="otherEmailAddress" value="{{ $employee->otherEmailAddress ? $employee->otherEmailAddress :  old('otherEmailAddress')}}"   autocomplete="otherEmailAddress">
                                @error('otherEmailAddress')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-md-4">
                                <input id="phonenumber" placeholder="Phone Number" type="text" class="form-group form-control @error('phoneNumber') is-invalid @enderror" name="phoneNumber" value="{{ $employee->phoneNumber ? $employee->phoneNumber : old('phoneNumber')   }}"    autocomplete="phoneNumber">
                                @error('phoneNumber')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-md-4">
                                <input id="altPhoneNumber" placeholder="Alt Phone Number" type="text" class="form-group form-control @error('altPhoneNumber') is-invalid @enderror" name="altPhoneNumber"  value="{{ $employee->altPhoneNumber ?  $employee->altPhoneNumber : old('altPhoneNumber') }}" autocomplete="altPhoneNumber">
                                @error('altPhoneNumber')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-md-4">
                                <input id="emergencyPhoneNumber" placeholder="Emergency Phone No" type="text" class="form-group form-control @error('emergency_contact') is-invalid @enderror" name="emergency_contact"  value="{{ $employee->emergency_contact ? $employee->emergency_contact : old('emergency_contact')  }}"  autocomplete="emergencyPhoneNumber">
                                @error('emergency_contact')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-md-4">
                                <input id="nhifNo" placeholder="NHIF" type="text" class="form-group form-control @error('nhifNo') is-invalid @enderror" name="nhifNo"  value="{{ $employee->nhifNo ?  $employee->nhifNo :  old('emergency_contact') }}"   autocomplete="nhifNo">
                                @error('nhifNo')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-md-4">
                                <input id="nssfNo" placeholder="NSSF" type="text" class="form-group form-control @error('nssfNo') is-invalid @enderror" name="nssfNo" value="{{ $employee->nssfNo ?  $employee->nssfNo : old('nssfNo')  }}"   autocomplete="nssfNo">
                                @error('nssfNo')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-md-4">
                                <input id="present_residence" placeholder="Physical Address" type="text" class="form-group form-control @error('present_residence') is-invalid @enderror" name="present_residence" value="{{ $employee->present_residence ?  $employee->present_residence : old('present_residence')  }}"   autocomplete="present_residence">
                                @error('present_residence')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-md-4">
                                <input  placeholder="Pin Number" type="text" class="form-group form-control @error('pinNo') is-invalid @enderror" name="pinNo" value="{{ $employee->pinNo ?  $employee->pinNo : old('pinNo')  }}"   autocomplete="pinNo">
                                @error('pinNo')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-md-4">
                                <input  placeholder="Postal Address" type="text" class="form-group form-control @error('postalAddress') is-invalid @enderror" name="postalAddress" value="{{ $employee->postalAddress ?  $employee->postalAddress : old('postalAddress')  }}"   autocomplete="postalAddress">
                                @error('postalAddress')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-md-4">
                                <input id="home_county" placeholder="Home County" type="text" class="form-group form-control @error('home_county') is-invalid @enderror" name="home_county" value="{{ $employee->home_county ?  $employee->home_county : old('home_county')  }}"   autocomplete="home_county">
                                @error('home_county')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-md-4">
                                <input id="joining_position" placeholder="Joining Position" type="text" class="form-group form-control @error('joining_position') is-invalid @enderror" name="joining_position" value="{{ $employee->joining_position ? $employee->joining_position : old('joining_position') }}"  autocomplete="joining_position">
                                @error('joining_position')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-md-4">
                                <input id="probation_period" placeholder="Probation Position" type="text" class="form-group form-control @error('probation_period') is-invalid @enderror" name="probation_period" value="{{ $employee->probation_period ? $employee->probation_period : old('probation_period') }}"  autocomplete="probation_period">
                                @error('probation_period')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-md-4">
                                <label for="">Physical Address</label>
                                <input id="current_address" placeholder="Physical Address" type="text" class="form-group form-control @error('current_address') is-invalid @enderror" name="current_address" value="{{ $employee->current_address ? $employee->current_address : old('current_address') }}"  autocomplete="current_address">
                                @error('current_address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            @if($employee->gender == "Male")
                            <div class="col-lg-6">
                                <label for="gender">{{ $employee->fname }} 's Grade</label>
                                <select class="browser-default custom-select" name="male_pastors_grade">
                                    @if($employee->male_pastors_grade)
                                        <option value="{{ $employee->male_pastors_grade }}">
                                            {{ $employee->male_pastors_grade }}
                                        </option>
                                        <option value="unlicensed">unlicensed</option>
                                        <option value="ordained">ordained</option>
                                    @endif
                                    @if($employee->male_pastors_grade == null)
                                    <option value="licensed">licensed</option>
                                    <option value="unlicensed">unlicensed</option>
                                    <option value="ordained">ordained</option>
                                @endif
                                </select>
                            </div>
                        @else
                            <div class="col-lg-6">
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
                                    @endif

                                </select>
                            </div>
                        @endif
                        </div>

                        <br>
                        <h4> Regions Section</h4>
                        <hr>
                        <div class="row">
                            <div class="col-md-4">
                                <label for="aic_regions_id">Aic Region</label>
                                <select class="browser-default custom-select" name="aic_regions_id">
                                      @foreach ($regions as $item)
                                       <option value="{{ $item->id }}">{{ $item->rName  }}</option>
                                      @endforeach
                                  </select>
                            </div>


                            <div class="col-md-4">
                                <label for="aic_dccs_id">DCC</label>
                                <select class="browser-default custom-select" name="aic_dccs_id">
                                      @foreach ($dcc as $item)
                                       <option value="{{ $item->id }}">{{ $item->dccName  }}</option>
                                      @endforeach
                                  </select>
                            </div>

                            <div class="col-md-4">
                                <label for="aic_lccs_id">LCC</label>
                                <select class="browser-default custom-select" name="aic_lccs_id">
                                      @foreach ($lcc as $item)
                                       <option value="{{ $item->id }}">{{ $item->lccName  }}</option>
                                      @endforeach
                                  </select>
                            </div>

                            <div class="col-md-4">
                              <label for="aic_jobgroups_id">Job Group</label>
                              <select class="browser-default custom-select" name="aic_jobgroups_id">
                                    @foreach ($jgroup as $item)
                                     <option value="{{ $item->id }}">{{ $item->jonGroupName  }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-4">
                              <label for="gender">Gender</label>
                                <select class="browser-default custom-select" name="gender">
                                    <option value="male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                            </div>

                            <div class="col-md-4">
                              <label for="gender">Marital Status</label>
                                <select class="browser-default custom-select" name="marital_status">
                                    <option value="married">Married</option>
                                    <option value="single">Single</option>
                                    <option value="divorced">Divorced</option>
                                    <option value="separated">Separated</option>
                                    <option value="widowed">Widowed</option>
                                </select>
                            </div>


                            <div class="col-md-4">
                                <label for="employee_type">Employee Type</label>
                                  <select class="browser-default custom-select" name="employee_type">
                                        <option value="FIELD">HQ</option>
                                        <option value="HQ">FIELD</option>
                                  </select>
                              </div>
                            <div class="col-md-4">
                              <label for="marital_status">Employee Status</label>
                                <select class="browser-default custom-select" name="employee_status">
                                    <option value="active">Active</option>
                                    <option value="suspended">Suspended</option>
                                    <option value="fired">Fired</option>
                                </select>
                            </div>


                            <div class="col-md-4">
                              <label for="joining_date">Joining Date </label>
                                <input id="joining_date" type="date" class="form-group form-control @error('joining_date') is-invalid @enderror" name="joining_date" value="{{ $employee->joining_date ? $employee->joining_date : old('joining_date')  }}"  autocomplete="joining_date">
                                @error('joining_date')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label for="confirmation_date">Comfirmation Date </label>
                                  <input id="confirmation_date" type="date" class="form-group form-control @error('confirmation_date') is-invalid @enderror" name="confirmation_date" value="{{ $employee->confirmation_date ? $employee->confirmation_date : old('confirmation_date')  }}"  autocomplete="confirmation_date">
                                  @error('confirmation_date')
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
                                <label for="d">Department  </label>
                                  <input id="department" placeholder="Department" type="text" class="form-group form-control @error('department') is-invalid @enderror" name="department" value="{{ $employee->department ? $employee->department : old('department')  }}"  autocomplete="department">
                                  @error('department')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                  @enderror
                              </div>

                        </div>

                        <hr>
                         <h4>Spouce Details Section</h4>
                        <div class="row">
                            <div class="col-md-4">
                                <input id="spouse_fname" placeholder="Spouse First Name" type="text" class="form-group form-control @error('spouse_fname') is-invalid @enderror" name="spouse_fname"  value="{{ $employee->spouse_fname ? $employee->spouse_fname : old('spouse_fname')}}"   autocomplete="spouse_fname">
                                @error('spouse_fname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <input id="spouse_lname" placeholder="Spouse Last Name" type="text" class="form-group form-control @error('spouse_lname') is-invalid @enderror" name="spouse_lname"  value="{{ $employee->spouse_lname ? $employee->spouse_lname  : old('spouse_lname') }}"  autocomplete="spouse_lname">
                                @error('spouse_lname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-md-4">
                                <input id="spouse_otherNames" placeholder="Spouse Other Names" type="text" class="form-group form-control @error('spouse_otherNames') is-invalid @enderror" name="spouse_otherNames"  value="{{ $employee->spouse_otherNames ? $employee->spouse_otherNames : old('spouse_otherNames') }}"    autocomplete="spouse_otherNames">
                                @error('spouse_otherNames')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-md-4">
                                <input id="spouse_phoneNumber" placeholder="Spouse Phone Number" type="text" class="form-group form-control @error('spouse_phoneNumber') is-invalid @enderror" name="spouse_phoneNumber"  value="{{ $employee->spouse_phoneNumber ? $employee->spouse_phoneNumber  : old('spouse_phoneNumber') }}"   autocomplete="spouse_phoneNumber">
                                @error('spouse_phoneNumber')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-md-4">
                                <input id="spouse_altphoneNumber" placeholder="Spouse alt Phone Number" type="text" class="form-group form-control @error('spouse_altphoneNumber') is-invalid @enderror" name="spouse_altphoneNumber"  value="{{ $employee->spouse_altphoneNumber ? $employee->spouse_altphoneNumber : old('spouse_altphoneNumber') }}"  autocomplete="spouse_altphoneNumber">
                                @error('spouse_altphoneNumber')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <input id="spouse_nationalId" placeholder="Spouse National ID" type="text" class="form-group form-control @error('spouse_nationalId') is-invalid @enderror" name="spouse_nationalId" value="{{ $employee->spouse_nationalId ?  $employee->spouse_nationalId : old('spouse_nationalId') }}" autocomplete="spouse_nationalId">
                                @error('spouse_nationalId')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <hr>
                        <h4>Next of Kin Details Section</h4>
                        <div class="row">
                            <div class="col-md-4">
                                <input id="next_of_kin_fname" placeholder="Next of Kin First Name" type="text" class="form-group form-control @error('next_of_kin_fname') is-invalid @enderror" name="next_of_kin_fname"  value="{{ $employee->next_of_kin_fname ? $employee->next_of_kin_fname  : old('next_of_kin_fname')}}"  autocomplete="next_of_kin_fname">
                                @error('next_of_kin_fname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <input id="next_of_kin_lname" placeholder="Next of Kin Last Name" type="text" class="form-group form-control @error('next_of_kin_lname') is-invalid @enderror" name="next_of_kin_lname"  value="{{ $employee->next_of_kin_lname ?  $employee->next_of_kin_lname : old('next_of_kin_lname')  }}" autocomplete="next_of_kin_lname">
                                @error('next_of_kin_lname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <input id="next_of_kin_otherNames" placeholder="Next of Kin Other Names" type="text" class="form-group form-control @error('next_of_kin_otherNames') is-invalid @enderror" name="next_of_kin_otherNames"  value="{{ $employee->next_of_kin_otherNames ?  $employee->next_of_kin_otherNames : old('next_of_kin_otherNames')  }}"   autocomplete="next_of_kin_otherNames">
                                @error('next_of_kin_otherNames')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <input id="next_of_kin_phoneNumber" placeholder="Next of Kin Phone Number" type="text" class="form-group form-control @error('next_of_kin_phoneNumber') is-invalid @enderror" name="next_of_kin_phoneNumber"  value="{{ $employee->next_of_kin_phoneNumber ? $employee->next_of_kin_phoneNumber : old('next_of_kin_phoneNumber')  }}"  autocomplete="next_of_kin_phoneNumber">
                                @error('next_of_kin_phoneNumber')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <input id="next_of_kin_altPhoneNumber" placeholder="Next of Kin alt Phone Number" type="text" class="form-group form-control @error('next_of_kin_altPhoneNumber') is-invalid @enderror" name="next_of_kin_altPhoneNumber" value="{{ $employee->next_of_kin_altPhoneNumber ? $employee->next_of_kin_altPhoneNumber : old('next_of_kin_altPhoneNumber') }}"   autocomplete="next_of_kin_altPhoneNumber">
                                @error('next_of_kin_altPhoneNumber')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <input id="next_of_kin_nationId" placeholder="Next of Kin National ID" type="text" class="form-group form-control @error('next_of_kin_nationId') is-invalid @enderror" name="next_of_kin_nationId" value="{{ $employee->next_of_kin_nationId ? $employee->next_of_kin_nationId : old('next_of_kin_nationId')  }}"   autocomplete="next_of_kin_nationId">
                                @error('next_of_kin_nationId')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <input id="next_of_kin_relationship" placeholder="Next of kin Relationship" type="text" class="form-group form-control @error('next_of_kin_relationship') is-invalid @enderror" name="next_of_kin_relationship" value="{{ $employee->next_of_kin_relationship ? $employee->next_of_kin_relationship :  old('next_of_kin_relationship')}}"   autocomplete="next_of_kin_relationship">
                                @error('next_of_kin_relationship')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <hr>
                                <div class="col-md-4">
                                    <label for="">Exit Date</label>
                                    <input id="exit_date" placeholder="Exit Date" type="date" class="form-group form-control @error('exit_date') is-invalid @enderror" name="exit_date" value="{{ $employee->exit_date ? $employee->exit_date :  old('exit_date')}}"   autocomplete="exit_date">
                                    @error('exit_date')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-md-4">
                                    <label for="password">Password</label>
                                    <input id="password" placeholder="Password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" value="{{ $employee->password }}" autocomplete="password">
                                       @error('password')
                                           <span class="invalid-feedback" role="alert">
                                               <strong>{{ $message }}</strong>
                                           </span>
                                       @enderror
                                </div>
                                <div class="col-md-4">
                                    <label for="password_confirmation">Confirm Password</label>
                                    <input id="password_confirmation" placeholder="Confirm Password" type="password" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation" value="{{ $employee->password_confirmation }}" autocomplete="password_confirmation">
                                       @error('password_confirmation')
                                           <span class="invalid-feedback" role="alert">
                                               <strong>{{ $message }}</strong>
                                           </span>
                                       @enderror
                                </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-12 text-right">
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

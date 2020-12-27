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
                    <li class="breadcrumb-item">
                        <a href="{{ route('dashboard')}}">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item active">Employee</li>
                </ul>
            </div>
            <div class="col-auto float-right ml-auto">
                <a class="btn add-btn" href="#" data-toggle="modal" data-target="#edit_leave">
                    Import Employees
                </a>
                {{-- <a class="btn add-btn" href="{{ route('employees.index')}}">All Employee</a> --}}
            </div>

        </div>
    </div>
    <!-- /Page Header -->


    <div class="row mt-5 justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Register Employee') }}</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('employees.store') }}">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <input id="fname" placeholder="First Name" type="text" class="form-group form-control @error('fname') is-invalid @enderror" name="fname" value="{{ old('fname') }}"  autocomplete="fname" autofocus>
                                @error('fname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <input id="lName" placeholder="Last Name" type="text" class="form-control @error('lName') is-invalid @enderror" name="lName" value="{{ old('lName') }}"  autocomplete="lName" autofocus>
                                @error('lName')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-md-6">
                              <input id="email" type="email" placeholder="Email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <input id="employeeID" placeholder="Employee ID" type="text" class="form-group form-control @error('employeeID') is-invalid @enderror" name="employeeID" value="{{ old('employeeID') }}"  autocomplete="employeeID">
                                @error('employeeID')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <input id="department" placeholder="Department" type="text" class="form-control @error('department') is-invalid @enderror" name="department" value="{{ old('department') }}"  autocomplete="department">
                                @error('department')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <input id="designation" placeholder="Designation" type="text" class="form-control @error('designation') is-invalid @enderror" name="designation" value="{{ old('designation') }}"  autocomplete="designation">
                                @error('designation')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label for="jobgroupid">Region</label>
                                  <select class="browser-default custom-select" name="aic_regions_id">
                                      <option value="" disabled selected>Choose Region</option>
                                      @foreach($regions as $item)
                                        <option value="{{$item->id}}">{{$item->rName}}</option>
                                      @endforeach
                                  </select>
                            </div>

                            <div class="col-md-6">
                                <label for="jobgroupid">DCC</label>
                                  <select class="browser-default custom-select" name="aic_dccs_id">
                                      <option value="" disabled selected>Choose DCC</option>
                                      @foreach($dcc as $item)
                                        <option value="{{$item->id}}">{{$item->dccName}}</option>
                                      @endforeach
                                  </select>
                            </div>

                            <div class="col-md-6">
                                <label for="jobgroupid">LCC</label>
                                  <select class="browser-default custom-select" name="aic_lccs_id">
                                      <option value="" disabled selected>Choose LCC</option>
                                      @foreach($lcc as $item)
                                        <option value="{{$item->id}}">{{$item->lccName}}</option>
                                      @endforeach
                                  </select>
                            </div>

                            <div class="col-md-6">
                              <label for="jobgroupid">Job Group</label>
                                <select class="browser-default custom-select" name="aic_jobgroups_id">
                                    <option value="" disabled selected>Choose Job Group</option>
                                    @foreach($jobgroup as $item)
                                      <option value="{{$item->id}}">{{$item->jonGroupName}}</option>
                                    @endforeach
                                </select>
                            </div>


                            <div class="col-md-6">
                                <label for="gender">Gender</label>
                                  <select class="browser-default custom-select" name="gender">
                                      <option value="" disabled selected>Choose Gender</option>
                                      <option value="male">Male</option>
                                      <option value="Female">Female</option>
                                  </select>
                              </div>

                            <div class="col-md-6">
                              <label for="joining_date">Joining Date </label>
                                <input id="joining_date" type="date" class="form-group form-control @error('joining_date') is-invalid @enderror" name="joining_date" value="{{ old('joining_date') }}"  autocomplete="joining_date">
                                @error('joining_date')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>


                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-12 text-right">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
  </div>       <!-- /Page Content -->
</div><!-- /Page Wrapper -->


  <!-- Edit Leave Modal -->
  <div id="edit_leave" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Upload Employees</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
             <form action="{{ route('employees.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="default-file-upload">
                    <div class="custom-file-upload">
                        <h1>
                    Custom File Upload
                    </h1>
                    <label for="file-upload" class="custom-file-upload1">
                        <i class="fa fa-cloud-upload"></i> Custom Upload
                    </label>
                    <input name="employeeUpload" id="file-upload" type="file" accept=".xlsx"/>
                    </div>
                    <div class="submit-section">
                        <button type="submit" class="btn btn-primary submit-btn">Submit</button>
                    </div>
                </div>

                </form>

            </div>
        </div>
    </div>
</div>
<!-- /Edit Leave Modal -->



@endsection

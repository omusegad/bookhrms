
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
                            <h3 class="page-title">Apply Leaves</h3>
                        </div>
                            @role('SuperAdmin|HrManager')
                            <div class="col-auto float-right ml-auto">
                                <a href="{{route('leaves.index')}}" class="btn add-btn"> All Leave</a>
                            </div>
                            @endrole
                            @role('Employees')
                                <div class="col-auto float-right ml-auto">
                                    <a href="{{url('/my-leaves')}}" class="btn add-btn"> All Leave</a>
                                </div>
                             @endrole
                    </div>
                </div>
                <!-- /Page Header -->


                <div class="row">
                    <div class="col-lg-12">
                        @if ($message = Session::get('message'))
                            <div class="alert alert-danger alert-dismissable">
                                <p>{{ Session::get('message') }}</p>
                                <button type = "button" class = "close" data-dismiss = "alert" aria-hidden = "true">
                                    ×
                                    </button>
                            </div>
                        @endif
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                            <form method="POST" action="{{route('leaves.store')}}">
                                @csrf
                                <div class="row ">
                                <div class="col-lg-4">
                                <label>Leave Type </label>
                                <select name="aic_leave_type_id" class="form-control" required>
                                    <option value="" disabled selected>Choose Leave Type</option>
                                    @foreach($leaveTpes as $types)
                                    <option value="{{$types->id}}">{{$types->leaveType}}</option>
                                    @endforeach
                                </select>
                                @error('aic_leave_type_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-lg-4">
                                <label>From </label>
                                    <input  id="start_date" name="start_date"  class="form-control" type="date" required>
                                    @error('start_date')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                  @enderror
                            </div>
                            <div class="col-lg-4">
                                <label>To </label>
                                    <input  id="end_date" name="end_date"  class="form-control" type="date" required>
                                    @error('end_date')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                   @enderror
                            </div>
                            <div class="col-6">
                                <label>Applied days </label>
                                <input id="days"  class="form-control " readonly name="appliedDays"  type="text" required>
                                @error('appliedDays')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                               @enderror
                            </div>
                            <div class="col-6">
                                <label>Leave Reason </label>
                                <textarea  name="reason" rows="4" class="form-control" required></textarea >
                                @error('reason')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                           @enderror
                            </div>
                        </div>

                            <div class="mt-3 text-right mb-5">
                                <button class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>


            </div>
            <!-- /Page Content -->


        </div>
        <!-- /Page Wrapper -->


@endsection


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
                    </div>
                </div>
                <!-- /Page Header -->

                @role('SuperAdmin|HrManager')
                        <!-- Leave Statistics -->
                        <div class="row">
                                <div class="col-lg-4">
                                    <div class="stats-info">
                                        <h6>Pending Approval</h6>
                                        <h4>{{ $pendingLeaves ?   $pendingLeaves : "0" }}</h4>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="stats-info">
                                        <h6>Approved Leaves</h6>
                                        <h4> {{ $approvedLeaves ?   $approvedLeaves : "0" }}</h4>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="stats-info">
                                        <h6>Declined Leaves</h6>
                                        <h4> {{ $declinedLeaves ?   $declinedLeaves : "0" }}</h4>
                                    </div>
                                </div>
                        </div>
                        <!-- /Leave Statistics -->
              @endrole

                <div class="row">
                    <div class="col-lg-12">
                                @if ($message = Session::get('message'))
                                    <div class="alert alert-danger">
                                        <p>{{ Session::get('message') }}</p>
                                    </div>
                                @endif
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                            <form method="POST" action="{{route('leaves.store')}}">
                                @csrf
                                <div class="row ">

                                <div class="col-6">
                                <label>Leave Type <span class="text-danger">*</span></label>
                                <select name="aic_leave_type_id" class="form-control">
                                    <option value="" disabled selected>Choose Leave Type</option>
                                    @foreach($leaveTpes as $types)
                                    <option value="{{$types->id}}">{{$types->leaveType}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-6">
                                <label>To <span class="text-danger">*</span></label>
                                    <input  id="end_date" name="end_date"  class="form-control" type="date">
                            </div>
                            <div class="col-6">
                                <label>From <span class="text-danger">*</span></label>
                                    <input  id="start_date" name="start_date"  class="form-control" type="date">
                            </div>
                            <div class="col-6">
                                <label>Applied days <span class="text-danger">*</span></label>
                                <input id="days"  class="form-control " readonly name="appliedDays"  type="text">
                            </div>
                            <div class="col-6">
                                <label>Remaining Leaves <span class="text-danger">*</span></label>
                                <input  class="form-control" readonly value="" type="text">
                            </div>
                            <div class="col-6">
                                <label>Leave Reason <span class="text-danger">*</span></label>
                                <textarea  name="reason" rows="4" class="form-control"></textarea>
                            </div>
                        </div>

                            <div class="mt-3 text-right mb-5">
                                <button class="btn btn-primary submit-btn">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>


            </div>
            <!-- /Page Content -->


        </div>
        <!-- /Page Wrapper -->


@endsection

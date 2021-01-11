
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
                            <h3 class="page-title">Leaves</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                                <li class="breadcrumb-item active">Leaves</li>
                            </ul>
                        </div>
                        <div class="col-auto float-right ml-auto">
                            <a href="{{route('leaves.index')}}" class="btn add-btn"> All Leave</a>
                        </div>
                    </div>
                </div>
                <!-- /Page Header -->

                <!-- Leave Statistics -->
                <div class="row">
                    <div class="col-md-3">
                        <div class="stats-info">
                            <h6>Today Presents</h6>
                            <h4>12 / 60</h4>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="stats-info">
                            <h6>Planned Leaves</h6>
                            <h4>8 <span>Today</span></h4>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="stats-info">
                            <h6>Unplanned Leaves</h6>
                            <h4>0 <span>Today</span></h4>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="stats-info">
                            <h6>Pending Requests</h6>
                            <h4>12</h4>
                        </div>
                    </div>
                </div>
                <!-- /Leave Statistics -->

                <div class="row">
                    <div class="col-lg-12">
                        @if ($message = Session::get('message'))
                            <div class="alert alert-danger">
                                <p>{{ Session::get('message') }}</p>
                            </div>
                        @endif
                    </div>
                </div>

                <div>

                        <form method="POST" action="{{route('leaves.store')}}">
                            @csrf
                            <div class="row ">

                            <div class="col-6">
                               <label>Leave Type <span class="text-danger">*</span></label>
                               <select name="aic_leave_type_id" class="select">
                                <option value="" disabled selected>Choose Leave Type</option>
                                 @foreach($leaveTpes as $types)
                                   <option value="{{$types->id}}">{{$types->leaveType}}</option>
                                 @endforeach
                               </select>
                        </div>
                           <div class="col-6">
                               <label>From <span class="text-danger">*</span></label>
                               <div class="">
                                   <input  id="start_date" name="start_date"  class="form-control" type="date">
                           </div>
                        </div>

                        <div class="col-6">
                               <label>To <span class="text-danger">*</span></label>
                               <div class="">
                                   <input  id="end_date" name="end_date"  class="form-control" type="date">
                           </div>
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

                           <div class="submit-section pull-right mb-5">
                               <button class="btn btn-primary submit-btn">Submit</button>
                           </div>

                       </form>
                </div>


            </div>
            <!-- /Page Content -->


        </div>
        <!-- /Page Wrapper -->


@endsection


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
                            <a href="{{route('leaves.create')}}" class="btn add-btn"><i class="fa fa-plus"></i> Apply Leave</a>
                        </div>
                    </div>
                </div>
                <!-- /Page Header -->

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



                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table id="leaves" class="table table-bordered table-striped custom-table mb-0">
                                <thead>
                                    <tr>
                                        <th>S/N</th>
                                        <th>Name</th>
                                        <th>Position</th>
                                        <th>Employee No</th>
                                        <th>Leave Type</th>
                                        <th>From</th>
                                        <th>To</th>
                                        <th>Reason </th>
                                        <th>Total Days </th>
                                        <th>Applied Days </th>
                                        <th>Remaining Days </th>
                                        <th>Approval Status </th>
                                    </tr>
                                </thead>
                                <tbody>
                                 @php ($count = 1)
                                 @foreach($leaves as $data)

                                    @if($data->id ==  Auth::user()->id)
                                            <tr>
                                                <td>{{$count++}}</td>
                                                <td>
                                                        <a href="{{ route('employees.edit',$data->users['fname'])}}">{{$data->users['fname']}} {{$data->users['lName']}}</a>
                                                </td>
                                                <td>{{$data->users['joining_position']}}</td>
                                                <td>{{$data->users['employeeID']}}</td>
                                                <td>{{$data->leavetype['leaveType']}}</td>
                                                <td>{{$data->start_date}}</td>
                                                <td>{{$data->end_date}}</td>
                                                <td>{{$data->reason}}</td>
                                                <td>{{ $data->leavetype['leave_days'] }}</td>
                                                <td>{{$data->appliedDays}} </td>
                                                <td>{{$data->remainingDays}} </td>
                                                <td >{{$data->leave_status}}</td>
                                            </tr>
                                        @endif
                                  @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Page Content -->

        </div>
        <!-- /Page Wrapper -->

@endsection

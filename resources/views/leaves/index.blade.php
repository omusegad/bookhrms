
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
                <div class="row mb-3">
                    <div class="col-lg-4">
                        <input type="text" id="myInput" class="form-control"  placeholder="Search for names ......">
                    </div>
               </div>


                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table id="leaves" class="table table-bordered table-striped custom-table mb-0">
                                <thead>
                                    <tr>
                                        <th>S/N</th>
                                        <th>Applied Date</th>
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
                                        <th>Status </th>
                                        <th> Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                 @php ($count = 1)
                                 @foreach($leaves as $data)
                                 @if(!empty($data))
                                            <tr>
                                                <td>{{$count++}}</td>
                                                <td>{{$data->created_at}}</td>
                                                <td>
                                                            {{$data->users['fname']}} {{$data->users['lName']}}
                                                </td>
                                                <td>{{$data->users['joining_position']}}</td>
                                                <td>{{$data->users['employeeID']}}</td>
                                                <td>{{$data->leavetype['leaveType']}}</td>
                                                <td>{{$data->start_date}}</td>
                                                <td>{{$data->end_date}}</td>
                                                <td>{{$data->reason}}</td>
                                                <td>{{ $data->leavetype['leave_days'] }}</td>
                                                <td>{{$data->appliedDays}} </td>
                                                <td>{{$data->remainingDays ?? "0"}} </td>
                                                <td >{{$data->leave_status}}</td>
                                                <td >
                                                    <button class="btn btn-primary"  data-toggle="modal" data-target="#aprprove_leave"> <i class="fas fa-check-circle"></i> Approve </button>
                                                </td>
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


         <!-- Edit Leave Modal -->
         <div id="aprprove_leave" class="modal custom-modal fade" role="dialog">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit Leave</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="form-group">
                                <label>Leave Type <span class="text-danger">*</span></label>
                                <select class="select">
                                    <option>Select Leave Type</option>
                                    <option>Casual Leave 12 Days</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>From <span class="text-danger">*</span></label>
                                <div class="cal-icon">
                                    <input class="form-control datetimepicker" value="01-01-2019" type="text">
                                </div>
                            </div>
                            <div class="form-group">
                                <label>To <span class="text-danger">*</span></label>
                                <div class="cal-icon">
                                    <input class="form-control datetimepicker" value="01-01-2019" type="text">
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Number of days <span class="text-danger">*</span></label>
                                <input class="form-control" readonly type="text" value="2">
                            </div>
                            <div class="form-group">
                                <label>Remaining Leaves <span class="text-danger">*</span></label>
                                <input class="form-control" readonly value="12" type="text">
                            </div>
                            <div class="form-group">
                                <label>Leave Reason <span class="text-danger">*</span></label>
                                <textarea rows="4" class="form-control">Going to hospital</textarea>
                            </div>
                            <div class="submit-section">
                                <button class="btn btn-primary submit-btn">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Edit Leave Modal -->

@endsection



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
                            <h3 class="page-title">Hq Leaves</h3>
                        </div>
                </div>

            <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table class="table table-striped" id="hqleaves">
                                <thead>
                                    <tr>
                                        <th>
                                            <input type="checkbox" name="select_all"  id="select_all">
                                        </th>
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
                              @foreach($leaves as $item)
                              @if($item->users)
                                <tr>
                                    <td>
                                        <input type="checkbox"  name="salaries[]" class="allusers" value="{{ $item->users['id'] }}"/>
                                    </td>
                                    <td>
                                        {{$item->users['fname'] }} {{$item->users['lName'] }}
                                    </td>
                                    <td>{{$item->users['joining_position'] }}</td>
                                    <td>{{$item->users['employeeID'] }}</td>
                                    <td>{{ $item->leavetype['leaveType'] }}</td>
                                    <td>{{$item->start_date}}</td>
                                    <td>{{$item->end_date}}</td>
                                   <td> {{ $item->reason }} </td>
                                   <td>{{ $item->leavetype['leaveDays'] }}</td>
                                    <td>{{ $item->appliedDays }}</td>
                                    <td>{{ $item->remainingDays }}</td>
                                    <td>{{ $item->leave_status }}</td>
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

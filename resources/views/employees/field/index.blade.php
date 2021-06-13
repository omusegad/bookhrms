

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
                            <h3 class="page-title">Field Staff</h3>
                        </div>
                    <div class="col-auto float-right ml-auto">
                        <a href="{{ route('employees.create') }}" class="btn add-btn"><i class="fa fa-plus"></i> Add Employee</a>
                        </div>
                    </div>
                </div>
                <!-- /Page Header -->

                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <div class="table-responsive">

                                <table class="table table-bordered" id="allsalaries">
                                    <thead>
                                        <tr>
                                            <th>
                                                <input id="select_all" type="checkbox">
                                            </th>
                                            <th>Name</th>
                                            <th>Employee ID</th>
                                            <th>Position</th>
                                            <th>Job Group</th>
                                            <th>Region</th>
                                            <th>DCC</th>
                                            <th>LCC</th>
                                            <th>Leave Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                 @php ($count = 1)
                                  @foreach($users as $user)
                                    <tr>
                                        <td>
                                            <input type="checkbox" value="{{ $user->id }}" name="users[]">
                                        </td>
                                        <td>
                                          <a href="{{ route('employees.edit',$user->id)}}">
                                            {{$user->fname }} {{$user->lName }}
                                          </a>
                                        </td>
                                        <td>{{$user->employeeID }}</td>
                                        <td>{{$user->joining_position }}</td>
                                        <td>{{$user->jobgroup['jonGroupName'] }}</td>
                                        <td>{{$user->region['rName'] }}</td>
                                        <td>{{$user->dcc['dccName'] }}</td>
                                        <td>{{$user->lcc['lccName'] }}</td>
                                        <td>
                                            @if(getLeaveStatus($user->id)  == "pending")
                                            <i class="fa fa-thumbs-down  text-danger" aria-hidden="true"></i>
                                            {{ getLeaveStatus($user->id) }}
                                          @elseif(getLeaveStatus($user->id)  == "approved")
                                            <i class="fa fa-check-circle text-success"></i>
                                            {{ getLeaveStatus($user->id) }}
                                          @elseif(getLeaveStatus($user->id)  == "declined")
                                             <i class="fa fa-times-circle" aria-hidden="true"></i> {{ getLeaveStatus($user->id) }}
                                          @else
                                             {{ "Active" }}
                                          @endif
                                         </td>
                                    </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Page Content -->

        </div>
        <!-- /Page Wrapper -->
 @endsection

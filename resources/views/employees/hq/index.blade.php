

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
                            <h4 class="page-title">HQ Staff</h4>
                        </div>
                    <div class="col-auto float-right ml-auto">
                        <a href="{{ route('employees.create') }}" class="btn add-btn"><i class="fa fa-plus"></i> Add Employee</a>
                        </div>
                    </div>
                </div>
                <!-- /Page Header -->

                <!-- Search Filter -->

                <!-- /Search Filter -->

                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <div class="table-responsive">
                                <table
                                id="hqusers"
                                data-search="true"
                                data-show-columns="true"
                                data-show-export="true"
                                data-click-to-select="true"
                                data-click-to-select="true"
                                data-pagination="false"
                                data-id-field="id"
                                data-show-pagination-switch="false"
                                data-response-handler="responseHandler">
                                    <thead>
                                        <tr>
                                            <th>S/N</th>
                                            <th>Name</th>
                                            <th>Employee ID</th>
                                            <th>Position</th>
                                            <th>Job Group</th>
                                            <th>Region</th>
                                            <th>DCC</th>
                                            <th>LCC</th>
                                            <th>Status</th>
                                            {{-- <th class="text-right no-sort">Action</th> --}}
                                        </tr>
                                    </thead>
                                    <tbody>
                                 @php ($count = 1)
                                  @foreach($users as $user)
                                    <tr>
                                        <td>{{$count++ }}</td>
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
                                        <td>{{$user->employee_status }} </td>
                                        {{-- <td class="text-right">
                                            <a class="" href="{{ route('employees.edit',$user->id)}}">
                                                <i class="fa fa-pencil m-r-5"></i> </a>

                                        </td> --}}
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

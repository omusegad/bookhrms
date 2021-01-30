

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
                            <h3 class="page-title">All Employee</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                                <li class="breadcrumb-item active">All Employee</li>
                            </ul>
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
                            <table class="table table-striped custom-table table-condensed table-bordered" id="employeesTable">
                                <thead>
                                    <tr>
                                        <th>Employee ID</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Region</th>
                                        <th>DCC</th>
                                        <th>LCC</th>
                                        <th>Status</th>
                                        <th class="text-right no-sort">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                             @php ($count = 1)
                              @foreach($users as $user)
                                <tr>
                                    <td>{{$user->employeeID }}</td>
                                    <td>
                                      <a href="{{ route('employees.edit',$user->id)}}">{{$user->fname }} {{$user->lName }}</a>
                                    </td>
                                    <td>{{$user->email }}</td>
                                    <td>{{$user->region['rName'] }}</td>
                                    <td>{{$user->dcc['dccName'] }}</td>
                                    <td>{{$user->lcc['lccName'] }}</td>
                                    <td>{{$user->employee_status }} </td>
                                    <td class="text-right">
                                        <a class="" href="{{ route('employees.edit',$user->id)}}">
                                            <i class="fa fa-pencil m-r-5"></i> </a>

                                    </td>
                                </tr>

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

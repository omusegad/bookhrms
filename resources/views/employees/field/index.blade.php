

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
                            <h3 class="page-title">Field Employees</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="{{ route('dashboard') }}">Dashboard</a>
                                </li>
                                <li class="breadcrumb-item active">Field Employee</li>
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
                                        <th>Employee Type</th>
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
                                            <a href="{{ route('employees.edit',$user->id)}}">
                                                {{$user->fname }} {{$user->lName }}
                                            </a>
                                    </td>
                                    <td>{{$user->email }}</td>
                                    <td>{{$user->employee_type }}</td>
                                    <td>{{$user->employee_status }}</td>
                                    <td class="text-right">
                                      <a class="" href="{{ route('employees.edit',$user->id)}}"><i class="fa fa-pencil m-r-5"></i></a>
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

            <!-- Delete Employee Modal -->
            <div class="modal custom-modal fade" id="delete_employee" role="dialog">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-body">
                            <div class="form-header">
                                <h3>Delete Employee</h3>
                                <p>Are you sure want to delete?</p>
                            </div>
                            <div class="modal-btn delete-action">
                                <div class="row">
                                    <div class="col-6">
                                        <a href="javascript:void(0);" class="btn btn-primary continue-btn">Delete</a>
                                    </div>
                                    <div class="col-6">
                                        <a href="javascript:void(0);" data-dismiss="modal" class="btn btn-primary cancel-btn">Cancel</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Delete Employee Modal -->

        </div>
        <!-- /Page Wrapper -->
 @endsection

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
                        <h3 class="page-title">Employee Salary</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                            <li class="breadcrumb-item active">Salary</li>
                        </ul>
                    </div>
                    <div class="col-auto float-right ml-auto">
                        <a href="#" class="btn add-btn" data-toggle="modal" data-target="#add_salary"><i class="fa fa-plus"></i> Add Salary</a>
                    </div>
                </div>
            </div>
            <!-- /Page Header -->

            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table table-striped custom-table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Employee</th>
                                    <th>Employee ID</th>
                                    <th>Job Group</th>
                                    <th>Basic Salalry</th>
                                    <th>House Allowance</th>
                                    <th>Transport Allowance</th>
                                    <th>Airtime Allowance</th>
                                    <th>Net Salary</th>
                                    <th>Payslip</th>
                                    <th class="text-right">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php ($count = 1)
                                @foreach ($salaries as $item)
                                <tr>
                                    <td>{{$count++}}</td>
                                    <td>
                                        <h2 class="table-avatar">
                                            <a href="#">{{$item->users['fname'] }} {{$item->users['fname'] }}</a>
                                        </h2>
                                    </td>
                                    <td>{{$item->users['employeeID'] }}</td>
                                    <td>{{$item->job_group }}</td>
                                    <td>Ksh {{number_format($item->basic_salary,2) }}</td>
                                    <td>Ksh {{number_format($item->hse_allowance, 2) }}</td>
                                    <td>Ksh {{number_format($item->transport_allowance,2) }}</td>
                                    <td>Ksh {{number_format($item->airtime_allowance,2) }}</td>
                                    <td>Ksh {{number_format($item->net_salary, 2) }}</td>
                                    <td><a class="btn btn-sm btn-primary" href="salary-view.html">Generate Slip</a></td>
                                    <td class="text-right">
                                        <div class="dropdown dropdown-action">
                                            <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a class="dropdown-item" href="{{route('salaries.edit', $item->id )}}"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                                            </div>
                                        </div>
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

        <!-- Add Salary Modal -->
        <div id="add_salary" class="modal custom-modal fade" role="dialog">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Add Employee Salary</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="{{route('salaries.store')}}">
                            @csrf
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Employee</label>
                                        <select name="user_id" class="select">
                                            <option value="" disabled selected>Select Employee</option>
                                            @foreach ($employees as $item)
                                              <option value="{{$item->id}}">{{$item->fname}} {{$item->lName}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Education</label>
                                        <select name="education" class="select">
                                            <option value="" disabled selected>Choose Education</option>
                                            <option value="certificate" >Certificate</option>
                                            <option value="diploma">Diploma</option>
                                            <option value="degree">Degree</option>
                                            <option value="psotgraduate">Postgraduate</option>
                                            <option value="masters">Masters</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Job Group</label>
                                        <select name="job_group" class="select">
                                            <option value="" disabled selected>Select Job Group</option>
                                            @foreach ($jobgroup as $item)
                                            <option value="{{$item->jonGroupName}}" >{{$item->jonGroupName}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Grade</label>
                                        <select name="grade" class="select">
                                            <option value="" disabled selected>Select Grade</option>
                                            <option value="unlicensed">unlicensed</option>
                                            <option value="Ladies 1-5">Ladies 1-5</option>
                                            <option value="licenced">licenced</option>
                                            <option value="Ladies 6-10">Ladies 6-10</option>
                                            <option value="ordained">ordained</option>
                                            <option value="Ladies 11 and above">Ladies 11 and above</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <input name="current_salary" placeholder="Current Salary" class="form-control" type="text">
                                    </div>
                                 </div>
                                 <div class="col-sm-4">
                                    <div class="form-group">
                                        <input name="basic_salary" placeholder="Basic Salary" class="form-control" type="text">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <input name="hse_allowance" placeholder="House Allowanace" class="form-control" type="text">
                                    </div>
                               </div>
                               <div class="col-sm-4">
                                    <div class="form-group">
                                        <input name="transport_allowance" placeholder="Transport Allowance " class="form-control" type="text">
                                    </div>
                               </div>
                               <div class="col-sm-4">
                                    <div class="form-group">
                                        <input name="airtime_allowance" Placeholder="Airtime Amount" class="form-control" type="text">
                                    </div>
                                </div>
                            </div>

                            <div class="submit-section">
                                <button class="btn btn-primary submit-btn">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Add Salary Modal -->

    </div>
    <!-- /Page Wrapper -->
@endsection

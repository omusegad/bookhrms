

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

                <div class="row">
                        <div class="col-12">
                            <form method="POST" action="{{route('hq-employees-export-excel.exportexcel')}}">
                                @csrf
                            <div class="row ">

                                <div class="col-lg-12 gen-box text-right">
                                    <ul>
                                        <li>
                                                <a class="ml-2 btn btn-outline-primary" href="{{ url('/hq-employees-export-excel') }}">Export to  excel</a>
                                        </li>
                                    </ul>
                                </div>

                            </div>
                        </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th><input type="checkbox" id="selectall" /> </th>
                                            <th>S/N</th>
                                            <th>Name</th>
                                            <th>Employee ID</th>
                                            <th>Position</th>
                                            <th>Job Group</th>
                                            <th>Region</th>
                                            <th>DCC</th>
                                            <th>LCC</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                 @php ($count = 1)
                                  @foreach($users as $user)
                                    <tr>
                                        <td>
                                            <input type="checkbox"  class="allusers"  name="userID[]"  value="{{$user->id  }}" />
                                        </td>
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
                                    </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            </div>
            <!-- /Page Content -->

        </div>
        <!-- /Page Wrapper -->
 @endsection

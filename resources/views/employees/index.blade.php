

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
                        </div>
                    <div class="col-auto float-right ml-auto">
                        <a href="{{ route('employees.create') }}" class="btn add-btn"><i class="fa fa-plus"></i> Add Employee</a>
                        </div>
                    </div>
                </div>
                <!-- /Page Header -->

                <div class="row">
                    <div class="col-lg-12">
                        @if(session()->has('message'))
                            <div class="alert alert-danger">
                                <a href="#" class="close" data-dismiss="alert">&times;</a>
                            {{session('message')}}
                            </div>
                        @endif
                    </div>
                 </div>

                <div class="row mb-3">
                    <div class="col-lg-4">
                        <input type="text" id="myInput" class="form-control"  placeholder="Search for names ......">
                    </div>
                    <div class="col-lg-8 text-right">

                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="allstaff">
                                        <thead>
                                            <tr>
                                            <th><input type="checkbox" id="selectall" /> </th>
                                            <th>S/N</th>
                                            <th>Name</th>
                                            <th>Employee ID</th>
                                            <th>Position</th>
                                            <th>Position 2</th>
                                            <th >Job Group</th>
                                            <th>Region</th>
                                            <th>DCC</th>
                                            <th>LCC</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php ($count = 1)
                                                @foreach($users as $user)
                                                <tr>
                                                <td>
                                                    <input type="checkbox" name="userID[]" class="allusers" value="{{$user->id  }}"  />
                                                </td>
                                                    <td>{{$count++ }}</td>
                                                    <td>
                                                        <a href="{{ route('employees.edit',$user->id)}}">
                                                        {{$user->fname }} {{$user->lName }}
                                                        </a>
                                                    </td>
                                                    <td>{{$user->employeeID }}</td>
                                                    <td>{{$user->joining_position }}</td>
                                                    <td>{{$user->secondPosition }}</td>
                                                    <td>{{$user->jobgroup['jonGroupName'] }}</td>
                                                    <td>{{$user->region['rName'] }}</td>
                                                    <td>{{$user->dcc['dccName'] }}</td>
                                                    <td>{{$user->lcc['lccName'] }}</td>
                                                    <td>{{$user->employee_status }} </td>
                                                    <td>
                                                        @can('delete articles')
                                                           <div class="action-btn">
                                                                <form action="{{ route('employees.destroy',$user->id)}}" method="POST">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="submit">
                                                                        <i class="fas fa-trash-alt"></i>
                                                                    </button>
                                                                </form>
                                                           </div>
                                                        @endcan
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

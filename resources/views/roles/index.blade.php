
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
                            <h3 class="page-title">Roles</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                                <li class="breadcrumb-item active">Roles</li>
                            </ul>
                        </div>
                        <div class="col-auto float-right ml-auto">
                            <a href="#" class="btn add-btn" data-toggle="modal" data-target="#add_leave">
                                <i class="fa fa-plus"></i> Asign Roles
                            </a>
                        </div>
                    </div>
                </div>
                <!-- /Page Header -->

                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table class="table table-striped custom-table mb-0">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Role Name</th>
                                        <th class="text-center">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @php ($count = 1)
                                @foreach($roles as $item)
                                    <tr>
                                        <td>
                                           {{$count++}}
                                        </td>
                                        <td>{{ $item->name}} </td>
                                        <td class="text-center">
                                         <a class="" href="#" data-toggle="modal" data-target="#edit_leave">
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

            <!-- Add Leave Modal -->
            <div id="add_leave" class="modal custom-modal fade" role="dialog">
                <div class="modal-dialog modal-dialog-centered col-lg-8" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Asign Role</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                           @if(session()->has('message'))
                              <div class="alert alert-success">
                                {{session('message')}}
                              </div>
                            @endif
                            <form method="POST" action="{{route('roles.store')}}">
                                @csrf
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <label for="jobgroupid">Employee</label>
                                          <select class="browser-default custom-select" name="employeeID">
                                              <option value="" disabled selected>Choose Employee</option>
                                              @foreach($users as $item)
                                                <option value="{{$item->id}}">{{$item->fname}} {{$item->lName}}</option>
                                              @endforeach
                                          </select>
                                    </div>

                                    <div class="col-md-12">
                                        <label for="jobgroupid">Role</label>
                                          <select class="browser-default custom-select" name="roleID">
                                              <option value="" disabled selected>Choose Employee</option>
                                              @foreach($roles as $item)
                                                <option  value="{{$item->id}}">{{$item->name}}</option>
                                              @endforeach
                                          </select>
                                    </div>

                                </div>
                                {{-- <div class="table-responsive m-t-15">
                                    <center><h4>Give Permission</h4> </center>
                                    <table class="table table-striped custom-table">
                                        <thead>
                                            <tr>
                                                <th class="text-center">Read</th>
                                                <th class="text-center">Edit</th>
                                                <th class="text-center">Create</th>
                                                <th class="text-center">Delete</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <tr>
                                                <td class="text-center">
                                                    <input value="1" name="readID" type="checkbox">
                                                </td>
                                                <td class="text-center">
                                                    <input  value="2" name="editID" type="checkbox">
                                                </td>
                                                <td class="text-center">
                                                    <input  value="3" name="createID" type="checkbox">
                                                </td>
                                                <td class="text-center">
                                                    <input  value="4" name="deleteID" type="checkbox">
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div> --}}
                                <div class="submit-section">
                                    <button type="submit" class="btn btn-primary submit-btn">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Add Leave Modal -->
        </div>
        <!-- /Page Wrapper -->
 @endsection

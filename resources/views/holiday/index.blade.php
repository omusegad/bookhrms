
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
                            <h3 class="page-title">Holidays</h3>
                        </div>
                        @can('create articles')
                            <div class="col-auto float-right ml-auto">
                                <a href="#" class="btn add-btn" data-toggle="modal" data-target="#add_leave">
                                    <i class="fa fa-plus"></i> Add Holiday
                                </a>
                            </div>
                        @endcan
                    </div>
                </div>
                <!-- /Page Header -->

                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive">
                        <table id="jobgroup" class="table table-striped custom-table mb-0">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Holiday Name</th>
                                        <th>Date</th>
                                        <!-- <th class="text-center">Status</th> -->
                                        <th class="text-right">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @php ($count = 1)
                                 @foreach($holidays as $data)
                                    <tr>
                                        <td>{{$count++}}</td>
                                        <td>{{ $data->hName}}</td>
                                        <td> {{$data->holidayDate ? $data->holidayDate: " " }}</td>
                                        <td class="text-right">
                                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#edit_leave">
                                                <i class="fa fa-pencil m-r-5"></i>
                                            </a>
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
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Add Holiday</h5>
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
                            <form method="POST" action="{{route('holidays.store')}}">
                                @csrf
                                <div class="form-group">
                                    <input class="form-control" placeholder="Holiday Name" type="text"  name="hName" required>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" type="date"  name="holidayDate" required>
                                </div>

                                <div class="submit-section">
                                    <button type="submit" class="btn btn-primary submit-btn">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Add Leave Modal -->



            <!-- Edit Leave Modal -->
            {{-- <div id="add_leave" class="modal custom-modal fade" role="dialog">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Edit Holiday</h5>
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
                            <form method="POST" action="{{route('holidays.update', )}}">
                                @csrf
                                <div class="form-group">
                                    <input class="form-control" placeholder="Holiday Name" type="text"  name="hName" required>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" type="date"  name="holidayDate" required>
                                </div>

                                <div class="submit-section">
                                    <button type="submit" class="btn btn-primary submit-btn">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div> --}}
            <!-- /edit Leave Modal -->

        </div>
        <!-- /Page Wrapper -->
 @endsection

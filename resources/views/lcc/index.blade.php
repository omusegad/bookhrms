
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
                            <h3 class="page-title">Local Church Council</h3>
                        </div>
                        <div class="col-auto float-right ml-auto">
                            <a href="#" class="btn add-btn" data-toggle="modal" data-target="#add_leave">
                                <i class="fa fa-plus"></i> Add LCC
                            </a>
                        </div>
                    </div>
                </div>
                <!-- /Page Header -->

                <!-- Leave Statistics -->
                <div class="row">
                    <div class="col-md-3">
                        <div class="stats-info">
                            <h6>Total Regions</h6>
                            <h4>{{$totalRegions ? $totalRegions: "0" }}</h4>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="stats-info">
                            <h6>Total DCCs</h6>
                            <h4>{{$totalDcc ? $totalDcc : "0"  }}</h4>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="stats-info">
                            <h6>Total LCCs</h6>
                            <h4>{{$totaLcc ? $totaLcc : "0"  }}</h4>
                        </div>
                    </div>

                </div>
                <!-- /Leave Statistics -->
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

                <div class="row">
                    <div class="col-md-9">
                        <div class="table-responsive">
                        <table class="table table-striped" id="leaves">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>LCC Name</th>
                                        <th class="text-center">Status</th>
                                        <th class="text-right">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>

                                @php ($count = 1)
                                @foreach($lcc as $data)
                                    <tr>
                                        <td>
                                           {{$count++}}
                                        </td>
                                        <td>{{ $data->lccName }} </td>
                                        <td>{{ $data->status }}  </td>
                                        <td class="text-centre">
                                            @can('delete articles')
                                            <div class="action-btn">
                                              <a href="{{route('lccs-regions.edit', $data->id)}}"><i class="fa fa-pencil m-r-5"></i> </a>
                                            </div>
                                            <div class="action-btn">
                                              <form action="{{ route('lccs-regions.destroy', $data->id)}}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="">
                                                            <i class="fa fa-trash-o m-r-5"></i>
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

            <!-- Add Leave Modal -->
            <div id="add_leave" class="modal custom-modal fade" role="dialog">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Add LCC</h5>
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
                            <form method="POST" action="{{route('lccs-regions.store')}}">
                                @csrf
                                <div class="form-group">
                                    <input class="form-control" placeholder="LCC Name" type="text" required name="dccName">
                                </div>
                                <div class="form-group">
                                    <label>Choose Region <span class="text-danger">*</span></label>

                                    <select name="dccID" class="select form-control">
                                    <option value="" disabled selected>Choose DCC Option</option>
                                      @foreach($dcc as $data)
                                        <option value="{{$data->id}}">{{$data->dccName}}</option>
                                      @endforeach
                                    </select>
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
            <div id="edit_leave" class="modal custom-modal fade" role="dialog">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Edit Leave</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form>
                                <div class="form-group">
                                    <label>Leave Type <span class="text-danger">*</span></label>
                                    <select class="select">
                                        <option>Select Leave Type</option>
                                        <option>Casual Leave 12 Days</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>From <span class="text-danger">*</span></label>
                                    <div class="cal-icon">
                                        <input class="form-control datetimepicker" value="01-01-2019" type="text">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>To <span class="text-danger">*</span></label>
                                    <div class="cal-icon">
                                        <input class="form-control datetimepicker" value="01-01-2019" type="text">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Number of days <span class="text-danger">*</span></label>
                                    <input class="form-control" readonly type="text" value="2">
                                </div>
                                <div class="form-group">
                                    <label>Remaining Leaves <span class="text-danger">*</span></label>
                                    <input class="form-control" readonly value="12" type="text">
                                </div>
                                <div class="form-group">
                                    <label>Leave Reason <span class="text-danger">*</span></label>
                                    <textarea rows="4" class="form-control">Going to hospital</textarea>
                                </div>
                                <div class="submit-section">
                                    <button class="btn btn-primary submit-btn">Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Edit Leave Modal -->

            <!-- Approve Leave Modal -->
            <div class="modal custom-modal fade" id="approve_leave" role="dialog">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-body">
                            <div class="form-header">
                                <h3>Leave Approve</h3>
                                <p>Are you sure want to approve for this leave?</p>
                            </div>
                            <div class="modal-btn delete-action">
                                <div class="row">
                                    <div class="col-6">
                                        <a href="javascript:void(0);" class="btn btn-primary continue-btn">Approve</a>
                                    </div>
                                    <div class="col-6">
                                        <a href="javascript:void(0);" data-dismiss="modal" class="btn btn-primary cancel-btn">Decline</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Approve Leave Modal -->

            <!-- Delete Leave Modal -->
            <div class="modal custom-modal fade" id="delete_approve" role="dialog">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-body">
                            <div class="form-header">
                                <h3>Delete Leave</h3>
                                <p>Are you sure want to delete this leave?</p>
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
            <!-- /Delete Leave Modal -->

        </div>
        <!-- /Page Wrapper -->
 @endsection

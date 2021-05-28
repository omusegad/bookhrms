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
                            <h3 class="page-title">Leave Type</h3>
                        </div>
                        <div class="col-auto float-right ml-auto">
                            <a href="#" class="btn add-btn" data-toggle="modal" data-target="#add_leavetype">
                                <i class="fa fa-plus"></i> Add Leave Type</a>
                        </div>
                    </div>
                </div>
                <!-- /Page Header -->

                <div class="row">
                    <div class="container">
                        <div class="col-lg-8">
                            <form method="POST" action="{{route('leave-types.update', $type->id)}}">
                                {{ method_field('PUT') }}
                                @csrf
                                <div class="form-group">
                                    <label>Leave Type <span class="text-danger">*</span></label>
                                    <input class="form-control" name="leaveType" type="text" value="{{ $type->leaveType }}">
                                </div>
                                <div class="form-group">
                                    <label>Number of days <span class="text-danger">*</span></label>
                                    <input class="form-control" name="leaveDays" type="text" value="{{ $type->leaveDays }}">
                                </div>
                                <div class="submit-section text-right">
                                    <button class="btn btn-primary">Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Page Content -->

            <!-- Add Leavetype Modal -->
            <div id="add_leavetype" class="modal custom-modal fade" role="dialog">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Add Leave Type</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                        <form method="POST" action="{{route('leave-types.store')}}">
                                 @csrf
                                <div class="form-group">
                                    <label>Leave Type <span class="text-danger">*</span></label>
                                    <input class="form-control" name="leaveType" type="text">
                                </div>
                                <div class="form-group">
                                    <label>Number of days <span class="text-danger">*</span></label>
                                    <input class="form-control" name="leaveDays" type="text">
                                </div>
                                <div class="submit-section">
                                    <button class="btn btn-primary submit-btn">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Add Leavetype Modal -->


        </div>
        <!-- /Page Wrapper -->
@endsection


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
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                                <li class="breadcrumb-item active">Local Church Council</li>
                            </ul>
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
                    <div class="col-md-9">
                        <div class="table-responsive">
                        <table class="table table-striped custom-table mb-0 ">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>LCC Name</th>
                                        <th>Status</th>
                                        <th class="text-center">Actions</th>
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
                                        <td>{{ $data->status }} </td>
                                        <td class="text-center">
                                                    <a class="" href="{{route('lccs-regions.edit', $data->id)}}">
                                                        <i class="fa fa-pencil m-r-5"></i>
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

        </div>
        <!-- /Page Wrapper -->
 @endsection

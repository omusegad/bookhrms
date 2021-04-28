@extends('layouts.app')

@section('content')

<!-- Page Wrapper -->
<div class="page-wrapper">
            <!-- Page Content -->
            <div class="content container-fluid">
                <!-- Page Header -->
                <div class="page-header">
                    <div class="row">
                        <div class="col-sm-12">
                            <h3 class="page-title">Welcome   {{ Auth::user()->fname }}!</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item active">Dashboard</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- /Page Header -->
                <div class="row">
                    <div class="col-lg-4">
                        <div class="card dash-widget">
                            <div class="card-body">
                                <span class="dash-widget-icon"><i class="fa fa-map-marker"></i></span>
                                <div class="dash-widget-info">
                                     <h3>{{$totalRegions ? $totalRegions: "0" }}</h3>
                                     @can('delete articles')
                                        <span><a href="{{ url('/regions') }}">Regions</a></span>
                                     @else
                                       <span>Regions</span>
                                    @endcan
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card dash-widget">
                            <div class="card-body">
                                <span class="dash-widget-icon"><i class="fa fa-map-pin"></i></span>
                                <div class="dash-widget-info">
                                    <h3>{{$totalDcc ? $totalDcc: "0" }}</h3>
                                    @can('delete articles')
                                    <span><a href="{{ url('/dccs-regions') }}">DCCs</a></span>
                                    @else
                                    <span>Regions</span>
                                    @endcan
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card dash-widget">
                            <div class="card-body">
                                <span class="dash-widget-icon"><i class="fa fa-home"></i></span>
                                <div class="dash-widget-info">
                                    <h3>{{$totaLcc ? $totaLcc: "0" }}</h3>
                                    @can('delete articles')
                                      <span><a href="{{ url('/lccs-regions') }}">LCCs</a></span>
                                    @else
                                      <span>Regions</span>
                                    @endcan
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            @can('publish articles')

                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-12">
                              <h4>Employees</h4>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="card dash-widget">
                                    <div class="card-body">
                                        <span class="dash-widget-icon"><i class="fa fa-group"></i></span>
                                        <div class="dash-widget-info">
                                            <h3>{{$employees ? $employees: "0" }}</h3>
                                            <span><a href="{{ route('employees.index') }}">Total Employees</a></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card dash-widget">
                                    <div class="card-body">
                                        <span class="dash-widget-icon"><i class="fa fa-group"></i></span>
                                        <div class="dash-widget-info">
                                            <h3>{{$male ?  $male: "0" }}</h3>
                                            <span><a href="{{ route('employees.index') }}">Total Male Employees</a></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card dash-widget">
                                    <div class="card-body">
                                        <span class="dash-widget-icon"><i class="fa fa-group"></i></span>
                                        <div class="dash-widget-info">
                                            <h3>{{$female ? $female: "0" }}</h3>
                                            <span><a href="{{ route('employees.index') }}">Total Female Employees</a></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="card flex-fill dash-statistics">
                        <div class="card-body">
                            <h5 class="card-title">Male Pastors</h5>
                            <div class="stats-list">

                                <div class="stats-info">
                                    <p>Total Male <strong>{{$licencedMalePastors + $unlicencedMalePastors + $ordainedMalePastors }}</strong></p>
                                </div>
                                <div class="stats-info">
                                    <p>Total Licensed <strong>{{$licencedMalePastors ? $licencedMalePastors: "0" }}</strong></p>

                                </div>
                                <div class="stats-info">
                                    <p>Total Unlicensed <strong>{{$unlicencedMalePastors ?  $unlicencedMalePastors: "0" }}</strong></p>
                                </div>
                                <div class="stats-info">
                                    <p>Total Ordained <strong>{{$ordainedMalePastors ? $ordainedMalePastors: "0" }}</strong></p>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="card flex-fill dash-statistics">
                        <div class="card-body">
                            <h5 class="card-title">Female Pastors Grade & Experience </h5>
                            <div class="stats-list">

                                <div class="stats-info">
                                    <p>Total Female <strong>
                                        {{$oneToFiveYearsFemalePastors + $sixToTenYearsFemalePastors + $sixToTenYearsFemalePastors}}
                                    </strong></p>
                                </div>
                                <div class="stats-info">
                                    <p>1 - 5 Years <strong>
                                        {{$oneToFiveYearsFemalePastors ? $oneToFiveYearsFemalePastors: "0" }}
                                    </strong></p>

                                </div>
                                <div class="stats-info">
                                    <p>6 - 10 Years  <strong>
                                        {{$sixToTenYearsFemalePastors ?  $sixToTenYearsFemalePastors: "0" }}
                                    </strong></p>
                                </div>
                                <div class="stats-info">
                                    <p>Eleven and Above Years <strong>
                                        {{$ElevenAndAboveYearsFemalePastors ? $ElevenAndAboveYearsFemalePastors: "0" }}
                                    </strong></p>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

                <!-- Statistics Widget -->
                <div class="row">
                    <div class="col-md-12 col-lg-6 col-xl-6 d-flex">
                        <div class="card flex-fill">
                            <div class="card-body">
                                <h4 class="card-title">Absent Today: <span class="badge bg-inverse-danger ml-2">5</span></h4>
                                <div class="leave-info-box">
                                    <div class="media align-items-center">
                                        <a href="profile.html" class="avatar"><img alt="" src="assets/img/user.jpg"></a>
                                        <div class="media-body">
                                            <div class="text-sm my-0">Martin Lewis</div>
                                        </div>
                                    </div>
                                    <div class="row align-items-center mt-3">
                                        <div class="col-6">
                                            <h6 class="mb-0">4 Sep 2019</h6>
                                            <span class="text-sm text-muted">Leave Date</span>
                                        </div>
                                        <div class="col-6 text-right">
                                            <span class="badge bg-inverse-danger">Pending</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="leave-info-box">
                                    <div class="media align-items-center">
                                        <a href="profile.html" class="avatar"><img alt="" src="assets/img/user.jpg"></a>
                                        <div class="media-body">
                                            <div class="text-sm my-0">Martin Lewis</div>
                                        </div>
                                    </div>
                                    <div class="row align-items-center mt-3">
                                        <div class="col-6">
                                            <h6 class="mb-0">4 Sep 2019</h6>
                                            <span class="text-sm text-muted">Leave Date</span>
                                        </div>
                                        <div class="col-6 text-right">
                                            <span class="badge bg-inverse-success">Approved</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="load-more text-center">
                                    <a class="text-dark" href="javascript:void(0);">Load More</a>
                                </div>
                            </div>
                        </div>
                    </div>



                </div>
                <!-- /Statistics Widget -->

            @endcan


            </div>
            <!-- /Page Content -->

        </div>
        <!-- /Page Wrapper -->

@endsection

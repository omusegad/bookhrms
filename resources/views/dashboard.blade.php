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
                    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                        <div class="card dash-widget">
                            <div class="card-body">
                                <span class="dash-widget-icon"><i class="fa fa-cubes"></i></span>
                                <div class="dash-widget-info">
                                    <h3>{{$employees ? $employees: "0" }}</h3>
                                    <span>Employees</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                        <div class="card dash-widget">
                            <div class="card-body">
                                <span class="dash-widget-icon"><i class="fa fa-usd"></i></span>
                                <div class="dash-widget-info">
                                    <h3>{{$totalRegions ? $totalRegions: "0" }}</h3>
                                    <span>Regions</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                        <div class="card dash-widget">
                            <div class="card-body">
                                <span class="dash-widget-icon"><i class="fa fa-diamond"></i></span>
                                <div class="dash-widget-info">
                                    <h3>{{$totalDcc ? $totalDcc: "0" }}</h3>
                                    <span>DCCs</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                        <div class="card dash-widget">
                            <div class="card-body">
                                <span class="dash-widget-icon"><i class="fa fa-user"></i></span>
                                <div class="dash-widget-info">
                                    <h3>{{$totaLcc ? $totaLcc: "0" }}</h3>
                                    <span>LCCs</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-6 text-center">
                                <div class="card">
                                    <div class="card-body">
                                        <h3 class="card-title">Total Revenue</h3>
                                        <div id="bar-charts"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 text-center">
                                <div class="card">
                                    <div class="card-body">
                                        <h3 class="card-title">Sales Overview</h3>
                                        <div id="line-charts"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                    <div class="col-md-12 col-lg-6 col-xl-4 d-flex">
                        <div class="card flex-fill">
                            <div class="card-body">
                                <h4 class="card-title">Today Absent <span class="badge bg-inverse-danger ml-2">5</span></h4>
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




            </div>
            <!-- /Page Content -->

        </div>
        <!-- /Page Wrapper -->

@endsection

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
                                <span class="dash-widget-icon"><i class="fa fa-group"></i></span>
                                <div class="dash-widget-info">
                                    <h3>{{$employees ? $employees: "0" }}</h3>
                                    <span><a href="{{ route('employees.index') }}">Employees</a></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                        <div class="card dash-widget">
                            <div class="card-body">
                                <span class="dash-widget-icon"><i class="fa fa-map-marker"></i></span>
                                <div class="dash-widget-info">
                                     <h3>{{$totalRegions ? $totalRegions: "0" }}</h3> 
                                    {{-- <!--<h3>6</h3>--> --}}
                                    <span><a href="{{ url('/regions') }}">Regions</a></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                        <div class="card dash-widget">
                            <div class="card-body">
                                <span class="dash-widget-icon"><i class="fa fa-map-pin"></i></span>
                                <div class="dash-widget-info">
                                    <h3>{{$totalDcc ? $totalDcc: "0" }}</h3>
                                    {{-- <h3>56</h3> --}}
                                    <span><a href="{{ url('/dccs-regions') }}">DCCs</a></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                        <div class="card dash-widget">
                            <div class="card-body">
                                <span class="dash-widget-icon"><i class="fa fa-home"></i></span>
                                <div class="dash-widget-info">
                                    <h3>{{$totaLcc ? $totaLcc: "0" }}</h3>
                                    {{-- <h3>371</h3> --}}
                                    <span><a href="{{ url('/lccs-regions') }}">LCCs</a></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-body">
                                        <h3 class="card-title">Total Salary Budget</h3>
                                        <div id="bar-charts">ksh. {{ $totalSalaries ? $totalSalaries : "0" }}</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-body">
                                        <h3 class="card-title">Gender</h3>
                                        <div class="row" id="bar-charts">
                                            <div class="col-md-12">
                                                <h4>Male: {{ $male ? $male : "0" }}</h4>
                                                <h4>Female: {{ $female ? $female : "0" }}</h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- <div class="row">
                    <div class="col-md-12">
                        <div class="card-group m-b-30">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between mb-3">
                                        <div>
                                            <span class="d-block">New Employees</span>
                                        </div>
                                        <div>
                                            <span class="text-success">+10%</span>
                                        </div>
                                    </div>
                                    <h3 class="mb-3">10</h3>
                                    <div class="progress mb-2" style="height: 5px;">
                                        <div class="progress-bar bg-primary" role="progressbar" style="width: 70%;" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <p class="mb-0">Overall Employees 297</p>
                                </div>
                            </div>



                        </div>
                    </div>
                </div> --}}

                <!-- Statistics Widget -->
                <div class="row">
                    {{-- <div class="col-md-12 col-lg-12 col-xl-4 d-flex">
                        <div class="card flex-fill dash-statistics">
                            <div class="card-body">
                                <h5 class="card-title">Statistics</h5>
                                <div class="stats-list">
                                    <div class="stats-info">
                                        <p>Today Leave <strong>4 <small>/ 65</small></strong></p>
                                        <div class="progress">
                                            <div class="progress-bar bg-primary" role="progressbar" style="width: 31%" aria-valuenow="31" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                    <div class="stats-info">
                                        <p>Pending Invoice <strong>15 <small>/ 92</small></strong></p>
                                        <div class="progress">
                                            <div class="progress-bar bg-warning" role="progressbar" style="width: 31%" aria-valuenow="31" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                    <div class="stats-info">
                                        <p>Completed Projects <strong>85 <small>/ 112</small></strong></p>
                                        <div class="progress">
                                            <div class="progress-bar bg-success" role="progressbar" style="width: 62%" aria-valuenow="62" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                    <div class="stats-info">
                                        <p>Open Tickets <strong>190 <small>/ 212</small></strong></p>
                                        <div class="progress">
                                            <div class="progress-bar bg-danger" role="progressbar" style="width: 62%" aria-valuenow="62" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                    <div class="stats-info">
                                        <p>Closed Tickets <strong>22 <small>/ 212</small></strong></p>
                                        <div class="progress">
                                            <div class="progress-bar bg-info" role="progressbar" style="width: 22%" aria-valuenow="22" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> --}}



                    <div class="col-md-12 col-lg-6 col-xl-6 d-flex">
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

                    <div class="col-md-12 col-lg-12 col-xl-6 d-flex">
                        <div class="card flex-fill dash-statistics">
                            <div class="card-body">
                                <h5 class="card-title">Overview</h5>
                                <div class="stats-list">
                                    <div class="stats-info">
                                        <p>All Pastors <strong>200</strong></p>
                                        {{-- <div class="progress">
                                            <div class="progress-bar bg-info" role="progressbar" style="width: 22%" aria-valuenow="22" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div> --}}
                                    </div>
                                    <div class="stats-info">
                                        <p>Ordained Pastors <strong>70</strong></p>
                                        {{-- <div class="progress">
                                            <div class="progress-bar bg-primary" role="progressbar" style="width: 31%" aria-valuenow="31" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div> --}}
                                    </div>
                                    <div class="stats-info">
                                        <p>Licensed Pastors <strong>20</strong></p>
                                        {{-- <div class="progress">
                                            <div class="progress-bar bg-warning" role="progressbar" style="width: 31%" aria-valuenow="31" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div> --}}
                                    </div>
                                    <div class="stats-info">
                                        <p>Unlicensed Pastors <strong>60</strong></p>
                                        {{-- <div class="progress">
                                            <div class="progress-bar bg-success" role="progressbar" style="width: 62%" aria-valuenow="62" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div> --}}
                                    </div>
                                    <div class="stats-info">
                                        <p>Evangelists <strong>50</strong></p>
                                        {{-- <div class="progress">
                                            <div class="progress-bar bg-danger" role="progressbar" style="width: 62%" aria-valuenow="62" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div> --}}
                                    </div>
                                   
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

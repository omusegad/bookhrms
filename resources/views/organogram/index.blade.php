
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
                            <h3 class="page-title">Organization Structure</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                                <li class="breadcrumb-item active">Organization Structure</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- /Page Header -->



                <div class="row">
                    <div class="col-md-12">
                    <div class="tree">
                <ul>
                    <li>
                        <a href="#">Area Church Council</a>
                        <ul>
                            <li>
                                <a href="#">Staff</a>
                                <ul class="vertical">
                                    <li><a href="#">Human Resources</a></li>
                                    <li><a href="#">Finance</a></li>
                                    <li><a href="#">Marketing</a></li>
                                    <li><a href="#">IT/IS</a></li>
                                    <li><a href="#">Service Delivery</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="#">BAMs</a>
                                <ul class="vertical">
                                    <li><a href="#">Applications</a></li>
                                    <li><a href="#">Mobility</a></li>
                                    <li><a href="#">Collaboration</a></li>
                                </ul>
                            </li>
                            <li><a href="#">Knowledge Committee</a></li>
                            <li>
                                <a href="#">Delivery Lund</a>
                                <ul>
                                    <li>
                                        <a href="#">Team Leads</a>
                                        <ul class="vertical">
                                            <li><a href="#">Team 1</a></li>
                                            <li><a href="#">Team 2</a></li>
                                            <li><a href="#">Team 3</a></li>
                                            <li><a href="#">Team 4</a></li>
                                            <li><a href="#">Team 5</a></li>
                                            <li><a href="#">Team 6</a></li>
                                            <li><a href="#">Team 7</a></li>
                                            <li><a href="#">Team 8</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="#">Sales</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="#">Delivery Stockholm</a>
                                <ul>
                                    <li>
                                        <a href="#">Team Leads</a>
                                        <ul class="vertical">
                                            <li><a href="#">Hokutō</a></li>
                                            <li><a href="#">The Other Team</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="#">Sales</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                </ul>
</div>
                    </div>
                </div>
            </div>
            <!-- /Page Content -->

        </div>
        <!-- /Page Wrapper -->
 @endsection

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
                        <h3 class="page-title">Employee Salary</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                            <li class="breadcrumb-item active">Salary</li>
                        </ul>
                    </div>
                    <div class="col-auto float-right ml-auto">
                        <a href="{{route('salaries.index' )}}" class="btn add-btn"><i class="fa fa-plus"></i> All Salary</a>
                    </div>
                </div>
            </div>
            <!-- /Page Header -->

            <div class="row">
                <div class="col-md-12">
                        <form method="POST" action="{{route('salaries.update', $salary->id )}}">
                            @csrf
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Education</label>
                                        <select name="education" class="select">
                                            <option value="" disabled selected>Choose Education</option>
                                            <option value="certificate" >Certificate</option>
                                            <option value="diploma">Diploma</option>
                                            <option value="degree">Degree</option>
                                            <option value="psotgraduate">Postgraduate</option>
                                            <option value="masters">Masters</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Job Group</label>
                                        <select name="job_group" class="select">
                                            <option value="" disabled selected>Select Job Group</option>
                                            @foreach ($jobgroup as $item)
                                            <option value="{{$item->jonGroupName}}" >{{$item->jonGroupName}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Grade</label>
                                        <select name="grade" class="select">
                                            <option value="" disabled selected>Select Grade</option>
                                            <option value="unlicensed">unlicensed</option>
                                            <option value="Ladies 1-5">Ladies 1-5</option>
                                            <option value="licenced">licenced</option>
                                            <option value="Ladies 6-10">Ladies 6-10</option>
                                            <option value="ordained">ordained</option>
                                            <option value="Ladies 11 and above">Ladies 11 and above</option>
                                        </select>
                                    </div>
                                </div>

                                 <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Basic Salary</label>
                                        <input name="basic_salary" value="{{$salary->basic_salary}}" placeholder="Basic Salary" class="form-control" type="text">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>House Allowance</label>
                                        <input name="hse_allowance" value="{{$salary->hse_allowance}}" placeholder="House Allowanace" class="form-control" type="text">
                                    </div>
                               </div>
                               <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Transport Allowance</label>
                                        <input name="transport_allowance" value="{{$salary->transport_allowance}}" placeholder="Transport Allowance " class="form-control" type="text">
                                    </div>
                               </div>
                               <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Airtime Allowance</label>
                                        <input name="airtime_allowance" value="{{$salary->airtime_allowance}}" Placeholder="Airtime Amount" class="form-control" type="text">
                                    </div>
                                </div>
                            </div>

                            <div class="submit-section pull-right">
                                <button class="btn btn-primary submit-btn">Submit</button>
                            </div>
                        </form>
                </div>
            </div>

        </div>

    </div>
    <!-- /Page Wrapper -->
@endsection


@extends('layouts.app')

@section('content')
	<!-- Page Wrapper -->
    <div class="page-wrapper">
            <!-- Page Content -->
            <div class="content container-fluid">
               <!-- Page Content -->
                <div class="content container-fluid">

                    <!-- Page Header -->
                    <div class="page-header">
                        <div class="row align-items-center">
                            <div class="col">
                                <h3 class="page-title">Salary Deduction Details</h3>
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                                    <li class="breadcrumb-item active">Salary Deduction Details</li>
                                </ul>
                            </div>
                            <div class="col-auto float-right ml-auto">
                                <a href="{{route('salaries.index')}}" class="btn add-btn">All Salaries</a>
                            </div>
                        </div>
                    </div>
                    <!-- /Page Header -->

                        <form method="POST" action="{{route('salary-settings.store')}}">
                            @csrf
                         <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <input name="nssfAmount" class="form-control" placeholder="NSSF Amount" type="text" required >
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <input name="nhifAmount" class="form-control" placeholder="NHIF Amount" type="text" required >
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <input name="paye" class="form-control" placeholder="P.A.Y.E. %" type="text">
                                </div>
                              </div>


                            <div class="submit-section">
                                <button type="submit" class="btn btn-primary submit-btn">Submit</button>
                            </div>
                          </div>
                        </form>
            </div>
            <!-- /Page Content -->


        </div>
        <!-- /Page Wrapper -->
 @endsection

@extends('layouts.app')

@section('content')

	<!-- Page Wrapper -->
    <div class="page-wrapper">

        <!-- Page Content -->
        <div class="content container-fluid">
            <!-- Page Header -->
            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <h3 class="page-title">Send Sms</h3>
                    </div>
                    <div class="col-lg-6">

                    </div>
                </div>
            </div>
            <!-- /Page Header -->

            <div class="row">
                <div class="col-md-12">
                    @if ($message = Session::get('message'))
                        <div class="alert alert-danger alert-block">
                            <strong>{{ $message }}</strong>
                        </div>
                    @endif
                </div>
            </div>
           <div>
            tabel data
           </div>
    </div>

    </div>
    <!-- /Page Wrapper -->
@endsection

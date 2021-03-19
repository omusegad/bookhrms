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
                <h3 class="page-title">Region</h3>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url('/')}}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Edit Region</li>
                </ul>
            </div>
            <div class="col-auto float-right ml-auto">
                <a href="{{ url('/regions') }}" class="btn add-btn"><i class="fa fa-eye"></i> View Regions</a>
                <div class="view-icons">
                     <a href="#" class="grid-view btn btn-link"><i class="fa fa-th"></i></a>
                     <a href="#" class="list-view btn btn-link active"><i class="fa fa-bars"></i></a>
                </div>
           </div>
        </div>
    </div>
    <!-- /Page Header -->


    <div class="row mt-5 justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Edit Region') }}</div>
                <div class="card-body">
                    @if(session()->has('message'))
                    <div class="alert alert-danger">
                        <a href="#" class="close" data-dismiss="alert">&times;</a>
                      {{session('message')}}
                    </div>
                    @endif
                    <!-- Only fields withe errors are to be validated -->
                    <form method="POST" action="{{route('regions.update', $region->id)}}">
                        {{ method_field('PUT') }}
                        @csrf
                       <div class="form-group">
                       <label for="">Region Name</label>
                       <input type="text" class="form-control" name="rName" value="{{$region->rName}}">
                       </div>
                       @error('rName')
                            <span class="invalid-feedback" role="alert">
                                 <strong>{{ $message }}</strong>
                            </span>
                      @enderror
                       <div class="from-group">
                             <button type="submit" class="btn btn-primary">{{__('Update')}}</button>
                             <a href="{{ url('/regions') }}" class="btn btn-warning">Back</a>
                       </div>
                    </form>
                </div>
            </div>
        </div>
    </div>




            </div>
            <!-- /Page Content -->





        </div>
        <!-- /Page Wrapper -->
 @endsection

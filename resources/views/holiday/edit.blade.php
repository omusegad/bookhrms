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
                <h3 class="page-title">Edit Holiday</h3>
            </div>
            <div class="col-auto float-right ml-auto">
                <a href="{{ url('/holidays') }}" class="btn add-btn"><i class="fa fa-eye"></i> All Holidays</a>
           </div>
        </div>
    </div>
    <!-- /Page Header -->


    <div class="row mt-5 justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Edit Holidays') }}</div>
                <div class="card-body">
                    @if(session()->has('message'))
                    <div class="alert alert-danger">
                        <a href="#" class="close" data-dismiss="alert">&times;</a>
                      {{session('message')}}
                    </div>
                    @endif
                    <!-- Only fields withe errors are to be validated -->
                    <form method="POST" action="{{route('holidays.update', $holiday->id)}}">
                        {{ method_field('PUT') }}
                        @csrf
                       <div class="form-group">
                            <label for="">Holiday Name</label>
                            <input type="text" class="form-control" name="hName" value="{{$holiday->hName}}" required>
                            @error('hHame')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Holiday Date</label>
                            <input type="date" class="form-control" name="hdate" value="{{$holiday->hDate}}">
                            @error('hdate')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                       <div class="from-group">
                             <button type="submit" class="btn btn-primary">{{__('Update')}}</button>
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

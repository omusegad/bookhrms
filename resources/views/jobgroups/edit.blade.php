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
                <h3 class="page-title">Edit Job Groups</h3>
            </div>
            <div class="col-auto float-right ml-auto">
                <a href="{{ url('/job-groups') }}" class="btn add-btn"><i class="fa fa-eye"></i> View Job groups</a>
           </div>
        </div>
    </div>
    <!-- /Page Header -->


    <div class="row mt-5 justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Edit LCC') }}</div>
                <div class="card-body">

                    <!-- Only fields withe errors are to be validated -->
                    <form method="POST" action="{{route('job-groups.update', $groups->id)}}">
                        {{ method_field('PUT') }}
                        @csrf
                       <div class="form-group">
                       <label for="">Job Group Name</label>
                       <input type="text" class="form-control" name="jonGroupName" value="{{$groups->jonGroupName}}">
                       </div>
                       @error('rName')
                            <span class="invalid-feedback" role="alert">
                                 <strong>{{ $message }}</strong>
                            </span>
                      @enderror
                       <div class="from-group">
                             <button type="submit" class="btn btn-primary">{{__('Update')}}</button>
                             <a href="{{ url('/lccs-regions') }}" class="btn btn-warning">Back</a>
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

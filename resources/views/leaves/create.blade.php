
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
                            <h3 class="page-title">Apply Leaves</h3>
                        </div>
                            @role('SuperAdmin|HrManager')
                            <div class="col-auto float-right ml-auto">
                                <a href="{{route('leaves.index')}}" class="btn add-btn"> All Leave</a>
                            </div>
                            @endrole
                            @role('Employees')
                                <div class="col-auto float-right ml-auto">
                                    <a href="{{url('/my-leaves')}}" class="btn add-btn"> All Leave</a>
                                </div>
                             @endrole
                        </div>
                </div>
                <!-- /Page Header -->
                <hr>

                <div class="row">
                    <div class="col-lg-12">
                        @if ($message = Session::get('message'))
                            <div class="alert alert-danger alert-dismissable">
                                <p>{{ Session::get('message') }}</p>
                                <button type = "button" class = "close" data-dismiss = "alert" aria-hidden = "true">
                                    ×
                                    </button>
                            </div>
                        @endif
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <form method="POST" action="{{route('leaves.store')}}">
                                @csrf
                            <div class="row ">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Leave Type </label>
                                        <select name="aic_leave_type_id" class="form-control" required>
                                            <option value="" disabled selected>Choose Leave Type</option>
                                            @foreach($leaveTpes as $types)
                                            <option value="{{$types->id}}">{{$types->leaveType}}</option>
                                            @endforeach
                                        </select>
                                        @error('aic_leave_type_id')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>From </label>
                                            <input  id="start_date" name="start_date"  class="form-control" type="date" required>
                                            @error('start_date')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label>To </label>
                                            <input  id="end_date" name="end_date"  class="form-control" type="date" required>
                                            @error('end_date')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Applied days </label>
                                        <input id="days"  class="form-control " readonly name="appliedDays"  type="text" required>
                                        @error('appliedDays')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                       @enderror
                                    </div>
                                   <div class="form-group">
                                        <label>Leave Reason </label>
                                        <textarea  name="reason" rows="5" class="form-control" required></textarea >
                                        @error('reason')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>



                            <div class="mt-3 text-right mb-5">
                                <button class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>

                </div>


            </div>
            <!-- /Page Content -->


        </div>
        <!-- /Page Wrapper -->

@push('custom-javascripts')

<script type="text/javascript">
    $(document).ready(function(){
        $('#start_date, #end_date').change(function(){
            var today = new Date().getDay();
            var startLeaveSDate =  new Date($("#start_date").val()) ;
            var endLeaveSDate =  new Date($("#end_date").val()) ;
            if(startLeaveSDate.getDay() > today && startLeaveSDate.getDay() == 6){
                var start_date = new Date(startLeaveSDate.setDate(startLeaveSDate.getDate()+2));
                console.log(start_date);
                document.getElementById('start_date').value = moment(start_date, 'DD-MM-YYYY').format('YYYY-MM-DD');
            }else if(startLeaveSDate.getDay() == 0){
                 start_date = new Date (startLeaveSDate.setDate(startLeaveSDate.getDate()+1));
                 document.getElementById('start_date').value = moment(start_date, 'DD-MM-YYYY').format('YYYY-MM-DD');

            }else{
                 start_date =  new Date($("#start_date").val()) ;
                 document.getElementById('start_date').value = moment(start_date, 'DD-MM-YYYY').format('YYYY-MM-DD');
            }

            if(endLeaveSDate.getDay() == 6){
                var end_date = new Date(endLeaveSDate.setDate(endLeaveSDate.getDate()+2));
                document.getElementById('end_date').value = moment(end_date, 'DD-MM-YYYY').format('YYYY-MM-DD');
                //console.log(end_date);
            }else if(endLeaveSDate.getDay() == 0){
                end_date = new Date(endLeaveSDate.setDate(endLeaveSDate.getDate()+1));
                document.getElementById('end_date').value = moment(end_date, 'DD-MM-YYYY').format('YYYY-MM-DD');

                //console.log(end_date);
            }else{
                end_date =  new Date($("#end_date").val()) ;
                document.getElementById('end_date').value = moment(end_date, 'DD-MM-YYYY').format('YYYY-MM-DD');

            }

            let get_days = 1000*60*60*24; //  days
            let daysdifference = end_date - start_date;
            if(daysdifference > 0){
                let number_of_days = Math.floor(daysdifference/get_days);
                document.getElementById('days').value = number_of_days;
               // console.log(moment(end_date).format('YYYY-MM-DD'));
                console.log(number_of_days + ' days');
           }else{
            document.getElementById('days').value = 0;
           }

        });
    });

</script>
@endpush

@endsection

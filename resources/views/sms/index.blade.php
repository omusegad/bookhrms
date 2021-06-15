@extends('layouts.app')

@section('content')

	<!-- Page Wrapper -->
    <div class="page-wrapper">

        <!-- Page Content -->
        <div class="content container-fluid">
            <!-- Page Header -->
            <div class="page-header">
                <div class="row">
                    <div class="col-md-12">
                        @if ($message = Session::get('message'))
                            <div class="alert alert-danger alert-block">
                                <strong>{{ $message }}</strong>
                            </div>
                        @endif
                    </div>
                </div>

                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <h3 class="page-title">Sms Contacts </h3>
                    </div>
                    <div class="col-lg-6 text-right">
                        <a class="btn btn-primary " href="{{ url('download-contacts') }}">
                            <i class="fa fa-download" aria-hidden="true"></i>
                            Excel Sample Format
                        </a>
                        <a class="btn btn-outline-primary" href="">Upload Contacts</a>
                    </div>
                </div>
            </div>
            <!-- /Page Header -->

 	<!-- Tabs -->
     <section class="comp-section" id="comp_tabs">
        <div class="row">
            <div class="col-lg-12">
                        <ul class="nav nav-tabs nav-tabs-top">
                            <li class="nav-item"><a class="nav-link profile-tab" href="#top-tab1" data-toggle="tab">Upload Contacts</a></li>
                            <li class="nav-item"><a class="nav-link profile-tab" href="#top-tab2" data-toggle="tab">Send sms to Employees</a></li>
                        </ul>

                        <div class="tab-content">
                            <div class="tab-pane show active" id="top-tab1">
                            <div class="table-responsive ">
                                <table class="table table-striped  table-bordered" id="allsalaries">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Phone Number</th>
                                            <th>Mesaage</th>
                                            <th>action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $count = 1
                                        @endphp
                                        @foreach ($contacts as $item )
                                        <tr>
                                            <td>
                                                {{ $count++ }}
                                            </td>
                                            <td>
                                                 {{  $item->phoneNumber }}
                                            </td>
                                            <td>
                                                {{  $item->textMessage }}
                                           </td>
                                           <td>
                                            <a id="process_salary" class="btn btn-outline-danger" data-url="{{ route('sms.store', $item->id) }}" data-name="{{ $item->textMessage }}"   data-salaryid="{{$item->id }}" data-toggle="modal" data-target="#modal-leave-{{ $item->id }}">
                                               Send sms
                                            </a>

                                                 <!-- Add Salary Modal -->
                                                 <div  class="modal custom-modal fade" role="dialog" id="modal-leave-{{ $item->id }}">
                                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title"> Would you like to this send sms ?</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form method="POST" action="{{route('sms.store')}}">
                                                                    @csrf
                                                                    <div class="row">
                                                                        <div class="col-sm-12">
                                                                            <div class="form-group">
                                                                                <label for=""> Contact Person </label>
                                                                                <input name="phoneNumber" Placeholder="" value="{{ $item->phoneNumber }}" class="form-control" type="text" readonly>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label>Message</label>
                                                                                <textarea name="message" placeholder="{{ $item->textMessage }}" value="{{ $item->textMessage }}" class="form-control rounded-0" id="exampleFormControlTextarea1" rows="4"></textarea>
                                                                            </div>
                                                                        </div>

                                                                    </div>

                                                                    <div class="submit-section text-right">
                                                                        <button type="submit" class="btn btn-primary">Submit</button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                          </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                    </div>

                    <div class="tab-pane " id="top-tab2">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="employees">
                                <thead>
                                    <tr>
                                    <th>
                                        <input id="select_all" type="checkbox">
                                    </th>
                                    <th>Name</th>
                                    <th>Phone Number</th>
                                    <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php ($count = 1)
                                        @foreach($users as $user)
                                        <tr>
                                            <td>
                                                <input type="checkbox" value="{{ $user->id }}" name="users[]">
                                            </td>
                                            <td>
                                                <a href="{{ route('employees.edit',$user->id)}}">
                                                {{$user->fname }} {{$user->lName }}
                                                </a>
                                            </td>
                                            <td>{{$user->phoneNumber }}</td>
                                            <td>
                                                    <a id="employee_sms" class="btn btn-outline-danger" data-url="{{ route('sms.store', $user->id) }}"   data-salaryid="{{$user->id }}" data-toggle="modal" data-target="#modal-leave-{{ $user->id }}">
                                                       Send sms
                                                    </a>

                                                         <!-- Add Salary Modal -->
                                                         <div  class="modal custom-modal fade" role="dialog" id="modal-leave-{{ $user->id }}">
                                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title"> Would you like to  this send sms ?</h5>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <form method="POST" action="{{route('sms.store')}}">
                                                                            @csrf
                                                                            <div class="row">
                                                                                <div class="col-sm-12">
                                                                                    <div class="form-group">
                                                                                        <input name="EmployeeName" Placeholder="" value="  {{$user->fname. ' '.$user->lName }}" class="form-control" type="text" readonly>
                                                                                    </div>
                                                                                    <div class="form-group">
                                                                                        <label for=""> Employee Number </label>
                                                                                        <input name="phoneNumber" Placeholder="" value="{{ $user->phoneNumber }}" class="form-control" type="text" readonly>
                                                                                    </div>
                                                                                    <div class="form-group">
                                                                                        <label>Message</label>
                                                                                        <textarea name="message" class="form-control rounded-0" id="exampleFormControlTextarea1" rows="4"></textarea>
                                                                                    </div>
                                                                                </div>

                                                                            </div>

                                                                            <div class="submit-section text-right">
                                                                                <button type="submit" class="btn btn-primary">Submit</button>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                  </td>
                                        </tr>
                                        @endforeach
                                        </tbody>
                                </table>
                        </div>
                    </div>

            </div>
        </div>
    </section>
    <!-- /Tabs -->


       </div>

    </div>
    <!-- /Page Wrapper -->




@endsection
@push('custom-javascripts')
<script>
    $("#submitbtn").click(function (event) {
    event.preventDefault();
    var data = $("#submitdataform").serialize();
    $("#saltbx").change(function (event) {
        event.preventDefault();
        var data = $("#saltForm").serializeArray();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });
        $.ajax({
            type: 'POST',
            url: "{{ url('trends-filter') }}",
            data: {
                data:JSON.stringify(data)
            },
            dataType: 'json',
            success: function (result) {


            },
            error: function (result) {
                console.log(result)
            }
        });
    });

});
</script>
@endpush

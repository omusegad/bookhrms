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


            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table table-striped  table-bordered" id="allsalaries">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Phone Number</th>
                                    <th>Mesaage</th>
                                    <th>Status</th>
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
                                       {{  $item->status }}
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
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

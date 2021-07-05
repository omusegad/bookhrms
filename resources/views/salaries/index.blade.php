@extends('layouts.app')

@section('content')

	<!-- Page Wrapper -->
    <div class="page-wrapper">

        <!-- Page Content -->
        <div class="content container-fluid">

            <!-- Page Header -->
            <div class="page-header mb-3">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="page-title">Employee Salary</h3>
                    </div>
                    <div class="col-auto float-right ml-auto">
                        <a href="#" class="btn add-btn" data-toggle="modal" data-target="#add_salary">
                            <i class="fa fa-plus"></i> Add Salary</a>
                    </div>
                </div>
            </div>
            <!-- /Page Header -->

            <div class="row">
                    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                        <div class="card dash-widget">
                            <div class="card-body">
                            <span class="dash-widget-icon"><i class="fa fa-usd"></i></span>
                                <div class="dash-widget-info">
                                    <h5>Ksh {{$totalBasicSalary ? number_format($totalBasicSalary): "0" }}</h5>
                                    <span>Total Basic Salary</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                        <div class="card dash-widget">
                            <div class="card-body">
                            <span class="dash-widget-icon"><i class="fa fa-usd"></i></span>
                                <div class="dash-widget-info">
                                    <h5> Ksh {{$totalNetPay ? number_format($totalNetPay): "0" }}</h5>
                                    <span>Total Employee Net Salary</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                        <div class="card dash-widget">
                            <div class="card-body">
                                <span class="dash-widget-icon"><i class="fa fa-usd"></i></span>
                                <div class="dash-widget-info">
                                    <h5>Ksh {{$totalHseAllowance ? number_format($totalHseAllowance): "0" }}</h5>
                                    <span>Total House Allowance</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                        <div class="card dash-widget">
                            <div class="card-body">
                            <span class="dash-widget-icon"><i class="fa fa-usd"></i></span>
                                <div class="dash-widget-info">
                                    <h5>Ksh {{$totalTransportAllowance ? number_format($totalTransportAllowance): "0" }}</h5>
                                    <span>Total Transport Allowance</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                        <div class="card dash-widget">
                            <div class="card-body">
                            <span class="dash-widget-icon"><i class="fa fa-usd"></i></span>
                                <div class="dash-widget-info">
                                    <h5> Ksh {{$totalAirtimeAllowance ? number_format($totalAirtimeAllowance): "0" }}</h5>
                                    <span>Total Airtime Allowance</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                        <div class="card dash-widget">
                            <div class="card-body">
                            <span class="dash-widget-icon"><i class="fa fa-usd"></i></span>
                                <div class="dash-widget-info">
                                    <h5> Ksh {{$totalIncomeTax ? number_format($totalIncomeTax): "0" }}</h5>
                                    <span>Total Income Tax</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                        <div class="card dash-widget">
                            <div class="card-body">
                            <span class="dash-widget-icon"><i class="fa fa-usd"></i></span>
                                <div class="dash-widget-info">
                                    <h5> Ksh {{$totalNhifAllowance ? number_format($totalNhifAllowance): "0" }}</h5>
                                    <span>Total NHIF</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                        <div class="card dash-widget">
                            <div class="card-body">
                            <span class="dash-widget-icon"><i class="fa fa-usd"></i></span>
                                <div class="dash-widget-info">
                                    <h5> Ksh {{$totalPayee ? number_format($totalPayee): "0" }}</h5>
                                    <span>Total P.A.Y.E</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            <div class="row">
              <div class="col-md-12">
                @if ($message = Session::get('message'))
                    <div class="alert alert-danger alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong>{{ $message }}</strong>
                    </div>
                @endif
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <form id="frm-example" method="POST">
                        @csrf
                    <div class="table-responsive">
                        <button id="submit" class="btn btn-outline-primary mb-3">Refresh All Payroll</button>
                        <table class="table table-striped  table-bordered" id="allsalaries">
                            <thead>

                                <tr>
                                    <th>
                                        <input name="select_all" value="1" id="example-select-all" type="checkbox" />
                                   </th>
                                    <th>Employee ID</th>
                                    <th>Staff Name</th>
                                    <th>Bank Name</th>
                                    <th>Bank Branch</th>
                                    <th>Bank Code</th>
                                    <th>Account Number</th>
                                    <th>Basic Pay (Ksh)</th>
                                    <th>Transport Allowance (Ksh)</th>
                                    <th>House Allowance (Ksh)</th>
                                    <th>Airtime ( Ksh)</th>
                                    <th>Hospitality Allowance (Ksh)</th>
                                    <th>Gross Pay (Ksh)</th>
                                    <th>P.A.Y.E (Ksh)</th>
                                    <th>Personal Relief (Ksh)</th>
                                    <th>Income Tax (Ksh)</th>
                                    <th>NSSF (Ksh)</th>
                                    <th>NHIF (Ksh)</th>
                                    <th>Net Pay (Ksh)</th>
                                    <th>Reference</th>
                                    <th class="text-right">Action</th>
                                    <th>Payment Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($salaries as $item)
                                <tr>
                                    <td>
                                        <input type="checkbox" name="id[]" value="{{$item->users['id'] }}">
                                    </td>
                                    <td>{{$item->users['employeeID'] }}</td>
                                    <td>
                                      <a href="{{route('salaries.edit',$item->id  )}}">
                                            {{$item->users['fname'] }} {{$item->users['lName'] }}
                                      </a>
                                    </td>
                                    <td> {{$item->bankName }}</td>
                                    <td> {{$item->bankBranch }}</td>
                                    <td> {{$item->bankCode }}</td>
                                    <td> {{$item->beneficiaryAccountNumber }}</td>
                                    <td> {{number_format($item->basic_salary) }}</td>
                                    <td> {{number_format($item->transport_allowance) }}</td>
                                    <td> {{number_format($item->hse_allowance) }}</td>
                                    <td> {{number_format($item->airtime_allowance) }}</td>
                                    <td> {{number_format($item->hospitality_allowance) }}</td>
                                    <td> {{number_format($item->gross_pay) }}</td>
                                    <td> {{number_format($item->payee) }}</td>
                                    <td> {{number_format($item->personalRelief) }}</td>
                                    <td> {{number_format($item->incomeTax) }}</td>
                                    <td> {{number_format($item->nssf) }}</td>
                                    <td> {{number_format($item->nhif) }}</td>
                                    <td> {{number_format($item->net_pay) }}</td>
                                    <td> {{$item->reference }}</td>
                                    <td class="text-ceter">
                                        <a class="" href="{{route('salaries.edit', $item->id )}}">
                                            <i class="fa fa-pencil m-r-5"></i>
                                        </a>
                                    </td>
                                    <td>
                                        @php
                                            $status = thisMonthsPayroll($item->users['id'])
                                        @endphp

                                        @if( $status =="pending" || empty($status))
                                         <div class="p-2 bg-danger font-weight-bold text-white text-center rounded">
                                            <i class="fa fa-thumbs-down text-white" aria-hidden="true"></i>
                                            {{ "Pending" }}
                                          </div>
                                        @elseif($status == "processed")
                                          <div class=" btn bg-success font-weight-bold text-white text-center rounded">
                                            <i class="fa fa-lock text-white"></i>
                                            {{ $status  }}
                                          </div>
                                        @elseif ($status == "rejected")
                                            <div class="btn bg-danger text-white  font-weight-bold text-center rounded">
                                                <i class="fa fa-times-circle"></i>
                                               {{ $status  }}
                                            </div>
                                        @else
                                        <div class="bg-danger font-weight-bold text-white text-center rounded">
                                            <i class="fa fa-thumbs-down text-white" aria-hidden="true"></i>
                                            {{ "Pending" }}
                                        </div>
                                        @endif
                                    </td>
                                </tr>
                              @endforeach
                            </tbody>
                        </table>
                    </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Page Content -->

        <!-- Add Salary Modal -->
        <div id="add_salary" class="modal custom-modal fade" role="dialog">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Add Employee Salary</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="{{route('salaries.store')}}">
                            @csrf
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Employee</label>
                                        <select name="user_id" class="select form-control">
                                            <option value="" disabled selected>Select Employee</option>
                                            @foreach ($employees as $item)
                                              <option value="{{$item->id}}">{{$item->fname}} {{$item->lName}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Job Group</label>
                                        <select name="job_group" class="select form-control">
                                            <option value="" disabled selected>Select Job Group</option>
                                            @foreach ($jobgroup as $item)
                                            <option value="{{$item->jonGroupName}}" >{{$item->jonGroupName}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                 <div class="col-sm-4">
                                    <div class="form-group">
                                        <input name="basic_salary" placeholder="Basic Salary" class="form-control" type="text">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <input name="hse_allowance" placeholder="House Allowance" class="form-control" type="text">
                                    </div>
                               </div>
                               <div class="col-sm-4">
                                    <div class="form-group">
                                        <input name="transport_allowance" placeholder="Transport Allowance " class="form-control" type="text">
                                    </div>
                               </div>
                               <div class="col-sm-4">
                                    <div class="form-group">
                                        <input name="airtime_allowance" Placeholder="Airtime Amount" class="form-control" type="text">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <input name="hospitality_allowance" Placeholder="Hospitality" class="form-control" type="text">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <input name="gross_pay" Placeholder="Gross Pay" class="form-control" type="text">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <input name="payee" Placeholder="P.A.Y.E" class="form-control" type="text">
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <input name="personalRelief" Placeholder="Personal Relief" class="form-control" type="text">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <input name="incomeTax" Placeholder="Income Tax" class="form-control" type="text">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <input name="nhif" Placeholder="NHIF Amount" class="form-control" type="text">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <input name="net_pay" Placeholder="Net Pay" class="form-control" type="text">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <input name="beneficiaryAccountNumber" Placeholder="Beneficiary Account Number" class="form-control" type="text">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="">Other Deductions</label>
                                        <input name="otherDeductions" Placeholder="Other Deductions" class="form-control" type="text">
                                    </div>
                                </div>

                                 <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="">Bank Name</label>
                                        <input name="bankName" value="KCB"  class="form-control" type="text" readonly>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="">Bank Branch</label>
                                        <input name="bankBranch" value="KAPSABET"  class="form-control" type="text" readonly>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="">Bank Code</label>
                                        <input name="bankCode" value="01166" class="form-control" type="text" readonly>
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for=""> Reference</label>
                                        <input name="reference" Placeholder="" value="Salary" class="form-control" type="text" readonly>
                                    </div>
                                </div>

                            </div>

                            <div class="submit-section">
                                <button class="btn btn-primary submit-btn">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Add Salary Modal -->


    </div>
    <!-- /Page Wrapper -->

@endsection

@push('custom-javascripts')
<script>

jQuery(document).ready(function ($){
   var table = $('#allsalaries').DataTable({
         dom: 'Bfrtip',
        lengthChange: false,
        buttons: ['excel','pdf'],
        columnDefs: [{
            orderable: false,
            className: 'select-checkbox',
            targets: 0,
            'className': 'dt-body-center',
        }],
        select: {
            style: 'os', // 'single', 'multi', 'os', 'multi+shift'
            selector: 'td:first-child',
            style: 'multi',
        },
        order: [
            [1, 'asc'],
        ],
    });

   // Handle click on "Select all" control
   $('#example-select-all').on('click', function(){
      // Check/uncheck all checkboxes in the table
      var rows = table.rows({ 'search': 'applied' }).nodes();
      $('input[type="checkbox"]', rows).prop('checked', this.checked);

   });

   // Handle click on checkbox to set state of "Select all" control
   $('#allsalaries tbody').on('change', 'input[type="checkbox"]', function(){
      // If checkbox is not checked
      if(!this.checked){
         var el = $('#example-select-all').get(0);
         // If "Select all" control is checked and has 'indeterminate' property
         if(el && el.checked && ('indeterminate' in el)){
            // Set visual state of "Select all" control
            // as 'indeterminate'
            el.indeterminate = true;
         }
      }
   });

   $('#frm-example').on('submit', function(e){
      var form = this;
      // Iterate over all checkboxes in the table
      table.$('input[type="checkbox"]').each(function(){
         // If checkbox doesn't exist in DOM
         if(!$.contains(document, this)){
            // If checkbox is checked
            if(this.checked){
               // Create a hidden element
               $(form).append(
                  $('<input>')
                     .attr('type', 'hidden')
                     .attr('name', this.name)
                     .val(this.value)
               );
            }
         }
      });

      //Output form data to a console
      var formData = $(form).serializeArray();
      $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url:  "{{ route('payroll.all') }}",
            data: formData,
            method: 'post',
            dataType: 'json',
            success: function (data) {

                console.log(data.result);
                if(data.result == 1){
                    swal({
                        title: "Trying to proccess empty list ?",
                        text: data.message,
                        icon: "warning",
                        dangerMode: true,
                    })
                }else{
                    swal({
                        title: "Maintenance Mode !",
                        text: "Currently unser Maintenance Please contact superadmin",
                        icon: "warning",
                        dangerMode: true,
                    })

                    // console.log(data);
                    // swal({
                    //     title: "Awesome : " + data.result + " Items proccessed",
                    //     text: data.message,
                    //     icon: "success",
                    //     dangerMode: false,
                    // })
                }
            },
            error: function (data) {
                console.log(data);
            }
        });

      // Prevent actual form submission
      e.preventDefault();
   });
});



</script>

@endpush

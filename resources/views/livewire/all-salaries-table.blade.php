
  <div class="row mb-2">
    <div class="col form-inline">
        Per Page: &nbsp;
        <select wire:model="perPage" class="form-control">
            <option>20</option>
            <option>40</option>
            <option>60</option>
            <option>120</option>
        </select>
    </div>
    
</div>


<div class="row">
    <div class="col-md-12">
        {{-- <input type="text" placeholder="Search" wire:model="search" /> --}}
        <div class="table-responsive">
            <table class="table table-striped custom-table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
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
                        <th>Approval Status</th>
                        <th>Status</th>
                        <th class="text-right">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <form method="POST" action="{{route('payroll.store')}}">
                      @csrf
                    @foreach ($salaries as $item)
                    <tr>
                        <td>
                            <input type="checkbox" name="userID[]" value="{{$item->users['id'] }}">
                        </td>
                        <td>{{$item->users['employeeID'] }}</td>
                        <td>
                          {{-- <a href="{{route('salaries.edit',$item->salary )}}"> --}}
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
                        <td> {{$item->approval_status }}</td>
                        <td> {{$item->status }}</td>
                        <td class="text-right">
                            {{-- <a class="" href="{{route('salaries.edit', $item->id )}}"><i class="fa fa-pencil m-r-5"></i> </a> --}}
                        </td>
                    </tr>


                  @endforeach
                  <div class="submit-section text-right">
                    <button type="submit" class="btn btn-primary">Generate Payroll</button>
                </div>
            </form>
                </tbody>
            </table>
            <div class="d-flex justify-content-center">
                {!! $salaries->links() !!}
            </div>
        </div>
    </div>
</div>


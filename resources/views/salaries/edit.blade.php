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
                        <h3 class="page-title">Edit Employee Salary</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Edit Employee Salary</li>
                        </ul>
                    </div>
                    <div class="col-auto float-right ml-auto">
                        <a href="{{route('salaries.index' )}}" class="btn add-btn"><i class="fa fa-plus"></i> All Salary</a>
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

            <div class="row">
                <div class="col-md-12">
                        <form method="POST" action="{{route('salaries.update', $salary->id )}}">
                            {{ method_field('PUT') }}
                            @csrf
                            <div class="row">

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="">First Name</label>
                                        <input name="fname" value="{{$salary->users->fname}}" class="form-control" type="text" readonly>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="">Last Name</label>
                                        <input name="lName" value="{{$salary->users->lName}}" class="form-control" type="text" readonly>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Basic Salary</label>
                                        <input name="basic_salary" value="{{$salary->basic_salary ? $salary->basic_salary : old('basic_salary')}}" class="form-control" type="text">
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Transport Allowance</label>
                                        <input name="transport_allowance" value="{{$salary->transport_allowance ? $salary->transport_allowance : old('transport_allowance') }}" class="form-control" type="text">
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>House Allowance</label>
                                        <input name="hse_allowance" value="{{$salary->hse_allowance ?  $salary->hse_allowance : old('hse_allowance')}}" class="form-control" type="text">
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Airtime Allowance</label>
                                        <input name="airtime_allowance" value="{{$salary->air_allowance ?  $salary->air_allowance : old('airtime_allowance')}}" class="form-control" type="text">
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Transport Allowance</label>
                                        <input name="transport_allowance" value="{{$salary->transport_allowance ? $salary->transport_allowance : old('transport_allowance')}}" class="form-control" type="text">
                                    </div>
                                </div>


                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Hospitality Allowance</label>
                                        <input name="hospitality_allowance" value="{{$salary->transport_allowance ? $salary->transport_allowance : old('hospitality_allowance')}}" class="form-control" type="text">
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Gross Pay</label>
                                        <input name="gross_pay" value="{{$salary->gross_pay ? $salary->gross_pay  : old('gross_pay') }}" class="form-control" type="text">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Payee</label>
                                        <input name="payee" value="{{$salary->payee ? $salary->payee  : old('payee') }}" class="form-control" type="text">
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Personal Reflief</label>
                                        <input name="personalRelief" value="{{$salary->personalRelief ? $salary->personalRelief : old('personalRelief') }}" class="form-control" type="text">
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Income tax</label>
                                        <input name="incomeTax" value="{{$salary->incomeTax ? $salary->incomeTax  : old('incomeTax') }}" class="form-control" type="text">
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Gross Pay</label>
                                        <input name="gross_pay" value="{{$salary->gross_pay ? $salary->gross_pay : old('gross_pay')}}" class="form-control" type="text">
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>NHIF</label>
                                        <input name="nhif" value="{{$salary->nhif ? $salary->nhif : old('nhif') }}" class="form-control" type="text">
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>NSSF</label>
                                        <input name="nssf" value="{{$salary->nssf ? $salary->nssf : old('nssf') }}" class="form-control" type="text">
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Net Pay</label>
                                        <input name="net_pay" value="{{$salary->net_pay ? $salary->net_pay : old('net_pay') }}" class="form-control" type="text">
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Bank Name</label>
                                        <input name="bankName" value="{{$salary->bankName ? $salary->bankName : old('branchName') }}" class="form-control" type="text">
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Branch Name</label>
                                        <input name="bankBranch" value="{{$salary->bankBranch ? $salary->bankBranch : old('bankBranch') }}" class="form-control" type="text">
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Bank Code</label>
                                        <input name="bankCode" value="{{$salary->bankCode ? $salary->bankCode : old('bankCode') }}" class="form-control" type="text">
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Beneficiary Account Number</label>
                                        <input name="beneficiaryAccountNumber" value="{{$salary->BeneficiaryAccountNumber ? $salary->BeneficiaryAccountNumber : old('beneficiaryAccountNumber') }}" class="form-control" type="text">
                                    </div>
                                </div>

                            </div>

                            <div class="submit-section pull-right">
                                <button class="btn btn-primary submit-btn">Submit</button>
                            </div>
                        </form>
                </div>
            </div>

        </div>

    </div>
    <!-- /Page Wrapper -->
@endsection

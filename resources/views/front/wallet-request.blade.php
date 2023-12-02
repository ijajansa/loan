@extends('layouts.app')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
    @include('admin-layouts.flash')
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Withdraw Amount</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
          <li class="breadcrumb-item active">Withdraw Amount</li>
        </ol>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <!-- left column -->
      <div class="col-md-8 offset-md-2">
        <!-- general form elements -->
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Request withdraw amount from earned amount</h3>
          </div>
          <!-- /.card-header -->
          <!-- form start -->
          <form action="{{url('wallet-withdraw')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
              <div class="row">
                <div class="col-md-12 text-center">
                  Transferable Balance <h2><span class="badge bg-success">{{Auth::user()->wallet??0}}</span></h2>
                </div>
              </div>

              <div class="row">
                <div class="col-md-12">
                  <div class="form-group required">
                    <label for="InputPrice" class="control-label">Withdrawal Amount</label>
                    <input type="number" name="amount" class="form-control @error('amount') is-invalid @enderror" id="InputAmount" placeholder="Enter Amount" value="{{old('amount')}}">
                    @error('amount')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                  </div>
                </div>
              </div>
              
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group required">
                    <label for="InputAccountHolderName" class="control-label">Account Holder Name</label>
                    <input type="text" name="account_holder_name" class="form-control @error('account_holder_name') is-invalid @enderror" id="InputAccountHolderName" placeholder="Enter Account Holder Name" onkeypress="return (event.charCode > 64 && 
                    event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || (event.charCode ==32)" value="{{old('account_holder_name')}}">
                    @error('account_holder_name')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group required">
                    <label for="InputBank" class="control-label">Bank Name</label>
                    <input type="text" name="bank_name" class="form-control @error('bank_name') is-invalid @enderror" id="InputBank" placeholder="Enter Bank Name" value="{{old('bank_name')}}" onkeypress="return (event.charCode > 64 && 
                    event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || (event.charCode ==32)">
                    @error('bank_name')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group required">
                    <label for="InputAccountNumber" class="control-label">Account Number</label>
                    <input type="number" name="account_number" class="form-control @error('account_number') is-invalid @enderror" id="InputAccountNumber" placeholder="Enter Account Number" value="{{old('account_number')}}">
                    @error('account_number')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group required">
                    <label for="InputIfscCode" class="control-label">IFSC Code</label>
                    <input type="text" name="ifsc_code" class="form-control @error('ifsc_code') is-invalid @enderror" id="InputIfscCode" placeholder="Enter IFSC Code" value="{{old('ifsc_code')}}">
                    @error('ifsc_code')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group required">
                    <label for="InputAccountType" class="control-label">Account Type</label>
                    <select name="account_type" class="form-control @error('account_type') is-invalid @enderror" id="InputAccountType">
                      <option value="">Select Account Type</option>
                      <option value="Saving">Saving</option>
                      <option value="Current">Current</option>
                      <option value="OD">OD</option>
                    </select>
                    @error('account_type')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                  </div>
                </div>

              </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
              <button type="submit" id="submitBtn" class="btn btn-primary">Verify and Submit</button>
            </div>
          </form>
        </div>
        <!-- /.card -->
      </div>
    </div>
  </div>
</section>
</div>
@endsection
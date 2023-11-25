@extends('layouts.app')
@section('content')

<section class="content-header">
  <div class="container-fluid">
    @include('admin-layouts.flash')
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Partner/Sub-DSA Form</h1>
      </div>
    </div>
  </div>
</section>
<section class="content">
  <div class="container-fluid">
   <div class="row">
    <div class="col-md-12">
     <div class="card card-primary">
      <div class="card-header">
       <h3 class="card-title">Edit Partner/Sub-DSA</h3>
     </div>
     <form action="{{url('edit-dsa')}}/{{Auth::user()->id}}" method="post" enctype="multipart/form-data">
      <input type="hidden" name="_token" value="{{csrf_token()}}">
      <div class="card-body">
        <div class="row">

          <div class="col-md-4">
            <div class="form-group required">
             <label for="InputFirstName" class="control-label">First Name</label>
             <input type="text" name="first_name" class="form-control @error('first_name') is-invalid @enderror" id="InputFirstName" placeholder="Enter First Name" value="{{old('first_name',Auth::user()->first_name)}}">
             @error('first_name')
             <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
           <label for="InputMiddleName" class="control-label">Middle Name</label>
           <input type="text" name="middle_name" class="form-control @error('middle_name') is-invalid @enderror" id="InputMiddleName" placeholder="Enter Middle Name" value="{{old('middle_name',Auth::user()->middle_name)}}">
           @error('middle_name')
           <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>
      </div>
      <div class="col-md-4">
        <div class="form-group required">
         <label for="InputLastName" class="control-label">Last Name</label>
         <input type="text" name="last_name" class="form-control @error('last_name') is-invalid @enderror" id="InputLastName" placeholder="Enter Last Name" value="{{old('last_name',Auth::user()->last_name)}}">
         @error('last_name')
         <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
        </span>
        @enderror
      </div>
    </div>
    <div class="col-md-4">
      <div class="form-group required">
       <label for="InputEmail" class="control-label">Email Id <small>Personal</small> </label>
       <div class="input-group mb-3">
        <div class="input-group-prepend">
         <span class="input-group-text"><i class="fas fa-envelope"></i></span>
       </div>
       <input type="email" name="email" id="InputEmail" class="form-control @error('email') is-invalid @enderror" placeholder="Email" value="{{old('email',Auth::user()->email)}}" disabled>
       @error('email')
       <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
      </span>
      @enderror
    </div>

  </div>
</div>
<div class="col-md-4">
  <div class="form-group required">
   <label for="InputMobileNumber" class="control-label">Mobile Number </label>
   <div class="input-group mb-3">
    <div class="input-group-prepend">
     <span class="input-group-text"><i class="fas fa-mobile-alt"></i></span>
   </div>
   <input type="tel" name="mobile_number" id="InputMobileNumber" class="form-control @error('mobile_number') is-invalid @enderror" placeholder="Mobile Number" value="{{old('mobile_number',Auth::user()->mobile_number)}}">
   @error('mobile_number')
   <span class="invalid-feedback" role="alert">
    <strong>{{ $message }}</strong>
  </span>
  @enderror
</div>

</div>
</div>

<div class="col-md-4">
  <div class="form-group required">
   <label for="InputMobileNumber1" class="control-label">Whatsapp Number </label>
   <div class="input-group mb-3">
    <div class="input-group-prepend">
     <span class="input-group-text"><i class="fab fa-whatsapp"></i></span>
   </div>
   <input type="tel" name="whatsapp_number" id="InputMobileNumber1" class="form-control @error('whatsapp_number') is-invalid @enderror" placeholder="Whatsapp Number" value="{{old('whatsapp_number',Auth::user()->whatsapp_number)}}">
   @error('whatsapp_number')
   <span class="invalid-feedback" role="alert">
    <strong>{{ $message }}</strong>
  </span>
  @enderror
</div>

</div>
</div>

<div class="col-md-6">
  <div class="form-group required">
   <label for="InputPanNumber" class="control-label">Permanent Account Number (PAN) </label>
   <input type="text" name="pan_number" id="InputPanNumber" class="form-control @error('pan_number') is-invalid @enderror" style="text-transform:uppercase" placeholder="PAN" value="{{old('pan_number',Auth::user()->pan_number)}}">
   @error('pan_number')
   <span class="invalid-feedback" role="alert">
    <strong>{{ $message }}</strong>
  </span>
  @enderror
</div>
</div>
<div class="col-md-6">
  <div class="form-group required">
   <label for="InputPanNumber2" class="control-label">Aadhar Number </label>
   <input type="number" min="0" name="aadhar_number" id="InputPanNumber2" class="form-control @error('aadhar_number') is-invalid @enderror" placeholder="Aadhar Number" value="{{old('aadhar_number',Auth::user()->aadhar_number)}}">
   @error('aadhar_number')
   <span class="invalid-feedback" role="alert">
    <strong>{{ $message }}</strong>
  </span>
  @enderror
</div>
</div>
</div>
<div class="row">
  <div class="col-md-12">
   <div class="card card-primary">
    <div class="card-header">
     <h3 class="card-title">Goods and Service Tax Details</h3>
   </div>
   <div class="card-body">
     <div class="row">
      <div class="col-md-6">
        <div class="form-group required">
          <label for="InputGSTType" class="control-label">GST Type </label>
          <select class="form-control form-select @error('gst_type') is-invalid @enderror" id="InputGSTType" name="gst_type">
            <option value="" @if(Auth::user()->gst_type=="") selected @endif>Select GST Type</option>
            <option value="Regular" @if(Auth::user()->gst_type=="Regular") selected @endif>Regular</option>
            <option value="Composit" @if(Auth::user()->gst_type=="Composit") selected @endif>Composit</option>
            <option value="Other" @if(Auth::user()->gst_type=="Other") selected @endif>Other</option>
          </select>
          @error('gst_type')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group required">
          <label for="InputGSTNumber" class="control-label">GST Number </label>
          <input type="text" name="gst_number" id="InputGSTNumber" class="form-control @error('gst_number') is-invalid @enderror" placeholder="Enter GST Number" value="{{old('gst_number',Auth::user()->gst_number)}}">
          @error('gst_number')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>
      </div>
    </div>
  </div>
</div>
</div>
</div>


<div class="row">
  <div class="col-md-12">
   <div class="card card-primary">
    <div class="card-header">
     <h3 class="card-title">Residence Address</h3>
   </div>
   <div class="card-body">
     <div class="row">
      <div class="col-md-6">
        <div class="form-group required">
          <label for="InputAddress" class="control-label">Residence Address </label>
          <textarea rows="3" class="form-control @error('address') is-invalid @enderror" name="address"  id="InputAddress" placeholder="Residence Address">{{old('address',Auth::user()->address??'')}}</textarea>
          @error('address')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>
      </div>
      <div class="col-lg-6">
        <div class="row">
          <div class="col-lg-12">
            <div class="form-group">
              <label class="form-label" for="full-name-12">Pincode <span class="text-danger">*</span></label>
              <div class="form-control-wrap">
                <input type="number" class="form-control @error('pincode') is-invalid @enderror" value="{{old('pincode',Auth::user()->pincode??'')}}" name="pincode" placeholder="Enter Pincode" id="full-name-12">
                @error('pincode')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="form-group">
              <div class="form-control-wrap">
                <input type="text" class="form-control @error('city') is-invalid @enderror" value="{{old('city',Auth::user()->city??'')}}" name="city" placeholder="City">
                @error('city')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="form-group">
              <div class="form-control-wrap">
                <input type="text" class="form-control @error('state') is-invalid @enderror" value="{{old('state',Auth::user()->state??'')}}" name="state" placeholder="State">
                @error('state')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="form-group">
              <div class="form-control-wrap">
                <input type="text" class="form-control @error('country') is-invalid @enderror" value="{{old('country',Auth::user()->country??'')}}" name="country" placeholder="Country">
                @error('country')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
</div>


<div class="row">
  <div class="col-md-12">
   <div class="card card-primary">
    <div class="card-header">
     <h3 class="card-title">Office Address</h3>
   </div>
   <div class="card-body">
     <div class="row">
      <div class="col-md-6">
        <div class="form-group required">
          <label for="InputAddress1" class="control-label"> Address </label>
          <textarea rows="3" class="form-control @error('office_address') is-invalid @enderror" name="office_address"  id="InputAddress1" placeholder="Office Address">{{old('office_address',Auth::user()->office_address??'')}}</textarea>
          @error('office_address')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>
      </div>
      <div class="col-lg-6">
        <div class="row">
          <div class="col-lg-12">
            <div class="form-group">
              <label class="form-label" for="full-name-12">Pincode <span class="text-danger">*</span></label>
              <div class="form-control-wrap">
                <input type="number" class="form-control @error('office_pincode') is-invalid @enderror" value="{{old('office_pincode',Auth::user()->office_pincode??'')}}" name="office_pincode" placeholder="Enter Pincode" id="full-name-12">
                @error('office_pincode')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="form-group">
              <div class="form-control-wrap">
                <input type="text" class="form-control @error('office_city') is-invalid @enderror" value="{{old('office_city',Auth::user()->office_city??'')}}" name="office_city" placeholder="City">
                @error('office_city')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="form-group">
              <div class="form-control-wrap">
                <input type="text" class="form-control @error('office_state') is-invalid @enderror" value="{{old('office_state',Auth::user()->office_state??'')}}" name="office_state" placeholder="State">
                @error('office_state')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="form-group">
              <div class="form-control-wrap">
                <input type="text" class="form-control @error('office_country') is-invalid @enderror" value="{{old('office_country',Auth::user()->office_country??'')}}" name="office_country" placeholder="Country">
                @error('office_country')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
</div>

<div class="row">
  <!-- left column -->
  <div class="col-md-12">
    <!-- general form elements -->
    <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title">Bank Details</h3>
      </div>
      <div class="card-body">
        <div class="row">
          <div class="col-md-4">
            <div class="form-group required">
              <label for="InputAccountType" class="control-label">Account Type</label>
              <select name="account_type" id="InputAccountType" class="form-control @error('account_type') is-invalid @enderror" >
                <option value="">Select Account Type</option>
                <option value="Saving" @if(Auth::user()->account_type=="Saving") selected @endif>Saving</option>
                <option value="Current" @if(Auth::user()->account_type=="Current") selected @endif>Current</option>
                <option value="Other" @if(Auth::user()->account_type=="Other") selected @endif>Other</option>
              </select>
              @error('account_type')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group required">
              <label for="InputAccountName" class="control-label">Account Name</label>
              <input type="text" name="account_name" class="form-control @error('account_name') is-invalid @enderror" id="InputAccountName" placeholder="Enter Account Name" value="{{Auth::user()->account_name ?? ''}}">
              @error('account_name')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group required">
              <label for="InputBankName" class="control-label">Bank Name</label>
              <input type="text" name="bank_name" class="form-control @error('bank_name') is-invalid @enderror" id="InputBankName" placeholder="Enter Bank Name" value="{{Auth::user()->bank_name ?? ''}}">
              @error('bank_name')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group required">
              <label for="InputIfscCode" class="control-label">IFSC Code</label>
              <input type="text" name="ifsc_code" class="form-control @error('ifsc_code') is-invalid @enderror" id="InputIfscCode" placeholder="Enter IFSC Code" value="{{Auth::user()->ifsc_code ?? ''}}">
              @error('ifsc_code')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group required">
              <label for="InputAccountNumber" class="control-label">Account Number</label>
              <input type="number" name="account_number" class="form-control @error('account_number') is-invalid @enderror" id="InputAccountNumber" placeholder="Enter Account Number" value="{{Auth::user()->account_number ?? ''}}">
              @error('account_number')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>
</div>






</div>
<!-- /.card-body -->
<div class="card-footer">

  <button type="submit" id="submitBtn" class="btn btn-primary">Submit</button>
</div>
</form>
</div>
<!-- /.card -->
</div>
</div>
</div>
</section>
@endsection
@extends('layouts.app')
@section('content')

<section class="content-header">
  <div class="container-fluid">
  @include('admin-layouts.flash')
   <div class="row mb-2">
    <div class="col-sm-6">
      <h1>{{$data->name ?? ''}} (New)</h1>
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
       <h3 class="card-title">Fill Loan Application</h3>
     </div>
     <form action="{{url('upload-loan')}}" method="post" enctype="multipart/form-data">
      <input type="hidden" name="_token" value="{{csrf_token()}}">
      <div class="card-body">
        <div class="row">
         <div class="col-md-4">
          <div class="form-group required">
           <label for="InputRequestedAmount" class="control-label">Loan Amount <small>in number only</small></label>
           <input type="number" name="requested_amount" class="form-control @error('requested_amount') is-invalid @enderror" id="InputRequestedAmount" placeholder="Enter required Loan amount" value="{{old('requested_amount')}}">
           @error('requested_amount')
           <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>
      </div>
      <input type="hidden" name="type" value="{{request()->query('type')}}">
      <div class="col-md-4">
        <div class="form-group required">
         <label for="InputRequestedDuration" class="control-label">Tenure (Months)</label>
         <select name="requested_duration" class="form-control @error('requested_duration') is-invalid @enderror" id="InputRequestedDuration">
           <option  value=12 @if(old('requested_duration')==12) selected @endif>12 Months</option>
           <option  value=24 @if(old('requested_duration')==24) selected @endif>24 Months</option>
           <option  value=36 @if(old('requested_duration')==36) selected @endif>36 Months</option>
           <option  value=48 @if(old('requested_duration')==48) selected @endif>48 Months</option>
           <option  value=60 @if(old('requested_duration')==60) selected @endif>60 Months</option>
           <option  value=72 @if(old('requested_duration')==72) selected @endif>72 Months</option>
           <option  value=84 @if(old('requested_duration')==84) selected @endif>84 Months</option>
           <option  value=96 @if(old('requested_duration')==96) selected @endif>96 Months</option>
           <option  value=108 @if(old('requested_duration')==108) selected @endif>108 Months</option>
           <option  value=120 @if(old('requested_duration')==120) selected @endif>120 Months</option>
           <option  value=132 @if(old('requested_duration')==132) selected @endif>132 Months</option>
           <option  value=144 @if(old('requested_duration')==144) selected @endif>144 Months</option>
           <option  value=156 @if(old('requested_duration')==156) selected @endif>156 Months</option>
           <option  value=168 @if(old('requested_duration')==168) selected @endif>168 Months</option>
           <option  value=180 @if(old('requested_duration')==180) selected @endif>180 Months</option>
           <option  value=192 @if(old('requested_duration')==192) selected @endif>192 Months</option>
           <option  value=204 @if(old('requested_duration')==204) selected @endif>204 Months</option>
           <option  value=216 @if(old('requested_duration')==216) selected @endif>216 Months</option>
           <option  value=228 @if(old('requested_duration')==228) selected @endif>228 Months</option>
           <option  value=240 @if(old('requested_duration')==240) selected @endif>240 Months</option>
           <option  value=252 @if(old('requested_duration')==252) selected @endif>252 Months</option>
           <option  value=264 @if(old('requested_duration')==264) selected @endif>264 Months</option>
           <option  value=276 @if(old('requested_duration')==276) selected @endif>276 Months</option>
           <option  value=288 @if(old('requested_duration')==288) selected @endif>288 Months</option>
           <option  value=300 @if(old('requested_duration')==300) selected @endif>300 Months</option>
           <option  value=312 @if(old('requested_duration')==312) selected @endif>312 Months</option>
           <option  value=324 @if(old('requested_duration')==324) selected @endif>324 Months</option>
           <option  value=336 @if(old('requested_duration')==336) selected @endif>336 Months</option>
           <option  value=348 @if(old('requested_duration')==348) selected @endif>348 Months</option>
           <option  value=360 @if(old('requested_duration')==360) selected @endif>360 Months</option>
         </select>
         @error('requested_duration')
         <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
        </span>
        @enderror
      </div>
    </div>
    <div class="col-md-4">
      <div class="form-group required">
       <label for="InputDob" class="control-label">Date of Birth <small>DD-MM-YYYY</small> </label>
       <div class="input-group date" id="Dob" data-target-input="nearest">
        <input type="date" id="dobInput" name="dob" class="form-control @error('dob') is-invalid @enderror" autocomplete="off" value="{{old('dob')}}">
        @error('dob')
        <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
        </span>
        @enderror
        <script>
         $(document).ready(function(){
          document.getElementById("dobInput").defaultValue = "";
        });
      </script>
    </div>
  </div>
</div>
<div class="col-md-4">
  <div class="form-group required">
   <label for="InputFirstName" class="control-label">First Name</label>
   <input type="text" name="first_name" class="form-control @error('first_name') is-invalid @enderror" id="InputFirstName" placeholder="Enter First Name" value="{{old('first_name')}}">
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
   <input type="text" name="middle_name" class="form-control @error('middle_name') is-invalid @enderror" id="InputMiddleName" placeholder="Enter Middle Name" value="{{old('middle_name')}}">
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
   <input type="text" name="last_name" class="form-control @error('last_name') is-invalid @enderror" id="InputLastName" placeholder="Enter Last Name" value="{{old('last_name')}}">
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
   <input type="email" name="email" id="InputEmail" class="form-control @error('email') is-invalid @enderror" placeholder="Email" value="{{old('email')}}">
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
   <label for="InputMobileNumber" class="control-label">Mobile Number <small>10 Digit only</small> </label>
   <div class="input-group mb-3">
    <div class="input-group-prepend">
     <span class="input-group-text"><i class="fas fa-mobile-alt"></i></span>
   </div>
   <input type="tel" name="mobile_number" id="InputMobileNumber" class="form-control @error('mobile_number') is-invalid @enderror" placeholder="Mobile Number" value="{{old('mobile_number')}}">
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
   <label for="InputPanNumber" class="control-label">Permanent Account Number (PAN) <small>10 Charactors Alpha-numeric</small> </label>
   <input type="text" name="pan_number" id="InputPanNumber" class="form-control @error('pan_number') is-invalid @enderror" style="text-transform:uppercase" placeholder="PAN" value="{{old('pan_number')}}">
   @error('pan_number')
   <span class="invalid-feedback" role="alert">
    <strong>{{ $message }}</strong>
  </span>
  @enderror
</div>
</div>
</div>
<div class="row">
 <div class="col-md-4">
  <div class="form-group required">
   <label for="InputEmploymentType" class="control-label">Employment Type</label>
   <select class="form-control @error('employment_type') is-invalid @enderror" name="employment_type" id="InputEmploymentType">
    <option value="">Select</option>
    <option  value="Salaried">Salaried</option>
    <option  value="Self Employed">Self Employed</option>
  </select>
  @error('employment_type')
  <span class="invalid-feedback" role="alert">
    <strong>{{ $message }}</strong>
  </span>
  @enderror
</div>
</div>
<div class="col-md-4">
  <div class="form-group required">
   <label for="InputRequestedDuration" class="control-label">Company Name</label>
   <input type="text" name="company_name" class="form-control @error('company_name') is-invalid @enderror" id="InputRequestedDuration" placeholder="Enter Company Name" value="{{old('company_name')}}">
   @error('company_name')
   <span class="invalid-feedback" role="alert">
    <strong>{{ $message }}</strong>
  </span>
  @enderror
</div>
</div>
<div class="col-md-4">
  <div class="form-group required">
   <label for="InputCompanyType" class="control-label">Company Type</label>
   <select class="form-control @error('company_type') is-invalid @enderror" name="company_type" id="InputCompanyType">
    <option value="">Select</option>
    <option  value="Public Limited Company">Public Limited Company</option>
    <option  value="One Person Company">One Person Company</option>
    <option  value="Private Limited Company">Private Limited Company</option>
    <option  value="Joint-Venture Company">Joint-Venture Company</option>
    <option  value="Partnership Firm">Partnership Firm</option>
    <option  value="Sole Proprietorship">Sole Proprietorship</option>
    <option  value="Branch Office">Branch Office</option>
    <option  value="Non-Government Organization (NGO)">Non-Government Organization (NGO)</option>
  </select>
  @error('company_type')
  <span class="invalid-feedback" role="alert">
    <strong>{{ $message }}</strong>
  </span>
  @enderror
</div>

</div>
<div class="col-md-4">
  <div class="form-group required">
   <label for="InputLastName" class="control-label">Annual Income/ Monthly Salary <small>in number only</small> </label>
   <input type="number" name="income_salary" class="form-control @error('income_salary') is-invalid @enderror" id="InputLastName" placeholder="Enter Annual Income/ Monthly Salary" value="{{old('income_salary')}}">
   @error('income_salary')
   <span class="invalid-feedback" role="alert">
    <strong>{{ $message }}</strong>
  </span>
  @enderror
</div>
</div>
<div class="col-md-4">
  <div class="form-group required">
   <label for="InputResidencePinCode" class="control-label">Residence Pin Code</label>
   <div class="input-group mb-3">
    <div class="input-group-prepend">
     <span class="input-group-text"><i class="fas fa-map-marker-alt"></i></span>
   </div>
   <input type="number" name="residence_pincode" id="InputResidencePinCode" class="form-control @error('residence_pincode') is-invalid @enderror" placeholder="Pin Code" value="{{old('residence_pincode')}}">
   @error('residence_pincode')
   <span class="invalid-feedback" role="alert">
    <strong>{{ $message }}</strong>
  </span>
  @enderror
</div>

</div>
</div>
<div class="col-md-4">
  <div class="form-group required">
   <label for="InputResidencePinCode" class="control-label">Pin Code</label>
   <div class="input-group mb-3">
    <div class="input-group-prepend">
     <span class="input-group-text"><i class="fas fa-map-marker-alt"></i></span>
   </div>
   <input type="number" name="permanent_pincode" id="InputResidencePinCode" class="form-control @error('permanent_pincode') is-invalid @enderror" placeholder="Pin Code" value="{{old('permanent_pincode')}}">
   @error('permanent_pincode')
   <span class="invalid-feedback" role="alert">
    <strong>{{ $message }}</strong>
  </span>
  @enderror
</div>

</div>
</div>
</div>

</div>
<!-- /.card-body -->
<div class="card-footer">
  <input type="hidden" name="loan_mode" value="New">
  <input type="hidden" name="step" value="basic">
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
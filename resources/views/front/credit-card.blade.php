@extends('layouts.app')
@section('content')
<section class="content-header">
  <div class="container-fluid">
   <div class="row mb-2">
    <div class="col-sm-6">
     <h1>Credit Card (New)</h1>
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
       <div class="row">
        <div class="col-6">
         <h3 class="card-title">Fill Credit Card Application</h3>
       </div>
       <div class="col-6 text-right">
         <a href="{{url('list-credit-cards')}}" class="btn btn-secondary" title="Go to existing application list">List</a>
       </div>
     </div>
   </div>
   <form action="{{url('credit-card')}}" method="post" enctype="multipart/form-data">
    @csrf
     <div class="card-body">
      <div class="row">
       <div class="col-sm-6 border-right p-2">
        <div class="row">
         <div class="col-md-6">
          <div class="form-group required">
           <label for="InputFirstName" class="control-label">First Name</label>
           <input type="text" name="first_name" class="form-control @error('first_name') is-invalid @enderror" id="InputFirstName" placeholder="Enter First Name" value="{{old('first_name')}}" onkeypress="return (event.charCode > 64 && 
                        event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || (event.charCode ==32)">
           @error('first_name')
           <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group required">
          <label for="InputFirstName1" class="control-label">Last Name</label>
          <input type="text" name="last_name" class="form-control @error('last_name') is-invalid @enderror" id="InputFirstName1" placeholder="Enter Last Name" value="{{old('last_name')}}" onkeypress="return (event.charCode > 64 && 
                        event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || (event.charCode ==32)">
          @error('last_name')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group required">
         <label for="InputMobileNumber" class="control-label">Mobile Number <small>10 Digit only</small> </label>
         <div class="input-group mb-3">
          <div class="input-group-prepend">
           <span class="input-group-text"><i class="fas fa-mobile-alt"></i></span>
         </div>
         <input type="tel" name="mobile_number" id="InputMobileNumber" class="form-control @error('mobile_number') is-invalid @enderror" maxlength="10" onkeypress='return event.charCode >= 48 && event.charCode <= 57' placeholder="Mobile Number" value="{{old('mobile_number')}}">
         @error('mobile_number')
         <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
        </span>
        @enderror
      </div>
    </div>
  </div>
  <div class="col-md-6">
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
   <label for="InputGender">Gender</label>
   <select name="gender" class="form-control @error('gender') is-invalid @enderror" id="InputGender">
    <option value="">Select Gender</option>
    <option  value="Male" @if(old('gender')=='Male') selected @endif>Male</option>
    <option  value="Female" @if(old('gender')=='Female') selected @endif>Female</option>
  </select>
  @error('gender')
  <span class="invalid-feedback" role="alert">
    <strong>{{ $message }}</strong>
  </span>
  @enderror
</div>
</div>
<div class="col-md-4">
  <div class="form-group required">
   <label for="InputDob">Date of Birth <small>DD-MM-YYYY</small> </label>
   <div class="input-group date" id="Dob" data-target-input="nearest">
    <input type="date" name="dob" class="form-control @error('dob') is-invalid @enderror" autocomplete="off" value="{{old('dob')}}" max="{{date('Y-m-d')}}">
    @error('dob')
    <span class="invalid-feedback" role="alert">
      <strong>{{ $message }}</strong>
    </span>
    @enderror
  </div>
</div>
</div>
<div class="col-md-4">
  <div class="form-group required">
   <label for="InputPan" class="control-label">Qualification</label>
   <div class="input-group mb-3">
    <select name="qualification" class="form-control @error('qualification') is-invalid @enderror" id="InputQualification">
     <option value="">Select Qualification</option>
     <option  value="10th pass">10th pass</option>
     <option  value="12th pass">12th pass</option>
     <option  value="Graduate">Graduate</option>
     <option  value="Post Graduate">Post Graduate</option>
     <option  value="others">others</option>
   </select>
   @error('qualification')
   <span class="invalid-feedback" role="alert">
    <strong>{{ $message }}</strong>
  </span>
  @enderror
</div>
</div>
</div>
<div class="col-md-6">
  <div class="form-group required">
   <label for="InputResidencePinCode" class="control-label">Current Pin Code</label>
   <div class="input-group mb-3">
    <div class="input-group-prepend">
     <span class="input-group-text"><i class="fas fa-map-marker-alt"></i></span>
   </div>
   <input type="text" maxlength="6" name="current_pincode" id="InputcurrentPinCode" class="form-control  @error('current_pincode') is-invalid @enderror" placeholder="Pin Code" onkeypress='return event.charCode >= 48 && event.charCode <= 57' value="{{old('current_pincode')}}">
   @error('current_pincode')
   <span class="invalid-feedback" role="alert">
    <strong>{{ $message }}</strong>
  </span>
  @enderror
</div>
</div>
</div>
<div class="col-md-6">
  <div class="form-group required">
   <label for="InputResidencePinCode" class="control-label">Permanent Pin Code</label>
   <div class="input-group mb-3">
    <div class="input-group-prepend">
     <span class="input-group-text"><i class="fas fa-map-marker-alt"></i></span>
   </div>
   <input type="text" maxlength="6" name="permanent_pincode" id="InputResidencePinCode" class="form-control @error('permanent_pincode') is-invalid @enderror" placeholder="Pin Code" onkeypress='return event.charCode >= 48 && event.charCode <= 57' value="{{old('permanent_pincode')}}">
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
<div class="col-sm-6 p-2">
  <div class="row">
   <div class="col-md-8">
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
   <label for="InputExistingCard" class="control-label">Have Credit Card</label>
   <select name="existing_card" class="form-control @error('existing_card') is-invalid @enderror" id="InputExistingCard">
    <option value="0">No</option>
    <option value="1">Yes</option>
  </select>
  @error('existing_card')
   <span class="invalid-feedback" role="alert">
    <strong>{{ $message }}</strong>
  </span>
  @enderror
</div>
</div>
<div class="col-md-6">
  <div class="form-group required">
   <label for="InputPanNumber" class="control-label">PAN</label>
   <input type="text" name="pan_number" id="InputPanNumber" class="form-control @error('pan_number') is-invalid @enderror" style="text-transform:uppercase" placeholder="PAN" maxlength="10" value="{{old('pan_number')}}">
   @error('pan_number')
   <span class="invalid-feedback" role="alert">
    <strong>{{ $message }}</strong>
  </span>
  @enderror
 </div>
</div>
<div class="col-md-6">
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
<div class="col-md-6">
  <div class="form-group required">
   <label for="InputPan" class="control-label">Profession</label>
   <div class="input-group mb-3">
    <select name="profession" class="form-control @error('profession') is-invalid @enderror" id="InputProfession">
     <option value="">Select Profession</option>
     <option  value="Bank/Insurance Employee">Bank/Insurance Employee</option>
     <option  value="Business Owner">Business Owner</option>
     <option  value="Customer Support">Customer Support</option>
     <option  value="Financial Advisor/ CA">Financial Advisor/ CA</option>
     <option  value="Homemaker/Housewife">Homemaker/Housewife</option>
     <option  value="Influencer">Influencer</option>
     <option  value="Insurance Agent">Insurance Agent</option>
     <option  value="Property Dealer/Travel Agent">Property Dealer/Travel Agent</option>
     <option  value="Sales & Marketing">Sales & Marketing</option>
     <option  value="Shop Owner/Merchant">Shop Owner/Merchant</option>
     <option  value="Student/Not working">Student/Not working</option>
     <option  value="Working Professional">Working Professional</option>
     <option  value="Others">Others</option>
   </select>
   @error('profession')
   <span class="invalid-feedback" role="alert">
    <strong>{{ $message }}</strong>
  </span>
  @enderror
 </div>
</div>
</div>
<div class="col-md-6">
  <div class="form-group required">
   <label for="InputOfficePinCode" class="control-label">Office Pin Code</label>
   <div class="input-group mb-3">
    <div class="input-group-prepend">
     <span class="input-group-text"><i class="fas fa-map-marker-alt"></i></span>
   </div>
   <input type="text" name="office_pincode" id="InputOfficePinCode" class="form-control @error('office_pincode') is-invalid @enderror" placeholder="Pin Code" onkeypress='return event.charCode >= 48 && event.charCode <= 57' maxlength="6" value="{{old('office_pincode')}}">
   @error('office_pincode')
   <span class="invalid-feedback" role="alert">
    <strong>{{ $message }}</strong>
  </span>
  @enderror
 </div>
</div>
</div>
</div>
</div>
<div class="col-md-3">
  <div class="form-group required">
   <label for="InputCompanyName" class="control-label">Company Name</label>
   <input type="text" name="company_name" id="InputCompanyName" class="form-control @error('company_name') is-invalid @enderror" placeholder="Company Name" value="{{old('company_name')}}" onkeypress="return (event.charCode > 64 && 
                        event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || (event.charCode ==32)">
   @error('company_name')
   <span class="invalid-feedback" role="alert">
    <strong>{{ $message }}</strong>
  </span>
  @enderror
 </div>
</div>
<div class="col-md-3">
  <div class="form-group required">
    <label for="InputDesignation" class="control-label">Designation</label>
   <input type="text" name="designation" id="InputDesignation" class="form-control @error('designation') is-invalid @enderror" placeholder="Designation" value="{{old('designation')}}" onkeypress="return (event.charCode > 64 && 
                        event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || (event.charCode ==32)">
   @error('designation')
   <span class="invalid-feedback" role="alert">
    <strong>{{ $message }}</strong>
  </span>
  @enderror
 </div>
</div>
<div class="col-md-3">
  <div class="form-group required">
   <label for="InputMotherName" class="control-label">Mother Name</label>
   <input type="text" name="mother_name" id="InputMotherName" class="form-control @error('mother_name') is-invalid @enderror" placeholder="Mother Name" value="{{old('mother_name')}}" onkeypress="return (event.charCode > 64 && 
                        event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || (event.charCode ==32)">
   @error('mother_name')
   <span class="invalid-feedback" role="alert">
    <strong>{{ $message }}</strong>
  </span>
  @enderror
 </div>
</div>
<div class="col-md-12">
  <input type="hidden" name="loan_mode" value="New">
  <input type="hidden" name="step" value="basic">
  <button type="submit" id="submitBtn" class="btn btn-primary float-right">Submit</button>
</div>
</div>
</div>
<div class="card-footer">

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
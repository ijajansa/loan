@extends('admin-layouts.app')
@section('content')
<div class="nk-content ">
  <div class="container">
   <div class="nk-content-inner">
    <div class="nk-content-body">
     <div class="nk-block-head nk-block-head-sm">
        @include('admin-layouts.flash')

        <div class="nk-block-between g-3">
           <div class="nk-block-head-content">
            <h3 class="nk-block-title page-title">Application Details</h3>
            <div class="nk-block-des text-soft">
             <p>Details of applied card data and documents</p>
         </div>
     </div>
     <div class="nk-block-head-content"><a href="{{url('credit-card-leads')}}" class="btn btn-outline-light bg-white d-none d-sm-inline-flex"><em class="icon ni ni-arrow-left"></em><span>Back</span></a><a href="{{url('credit-card-leads')}}" class="btn btn-icon btn-outline-light bg-white d-inline-flex d-sm-none"><em class="icon ni ni-arrow-left"></em></a></div>
 </div>
</div>
<div class="nk-block">
  <div class="row g-gs">
   <div class="col-lg-4 col-xl-4 col-xxl-3">
    <div class="card">
     <div class="card-inner-group">
      <div class="card-inner">
       <div class="user-card user-card-s2">
        <div class="user-avatar lg bg-primary"><img src="{{url('storage/app/')}}/{{$data->agents->profile}}" alt="" style="width: 82px;height: 82px;"></div>
        <div class="user-info">
         <div class="badge bg-light rounded-pill ucap">Agent Details</div>
         <h5>{{ucfirst($data->agents->first_name)??''}} {{ucfirst($data->agents->last_name)??''}}</h5>
         <span class="sub-text">{{$data->agents->email}}</span>
         <span class="sub-text">{{$data->agents->mobile_number}}</span>
         <span class="sub-text">{{$data->agents->office_address ?? $data->agents->address}}</span>
         @if($data->agents->role_id==2)
         <div class="badge bg-success rounded-pill ucap">DSA</div>
         @else
         <div class="badge bg-warning rounded-pill ucap">Sub DSA</div>
         @endif
     </div>
     <form method="POST" action="{{url('credit-card-leads')}}/status/{{$data->id}}">
        @csrf
        <div class="row">

         <div class="col-lg-12" style="text-align: left;">
            <div class="form-group" style="margin-bottom: 8px;">
                <label class="form-label" for="full-name-1">Update Application Status</label>
                <div class="form-control-wrap">
                    <select class="form-control form-select" name="status">
                        <option value="PDC" @if($data->status=='PDC') selected @endif>PDC</option>
                        <option value="Login" @if($data->status=='Login') selected @endif>Login</option>
                        <option value="Process" @if($data->status=='Process') selected @endif>Process</option>
                        <option value="Disbursement" @if($data->status=='Disbursement') selected @endif>Disbursement</option>
                        <option value="Cancel" @if($data->status=='Cancel') selected @endif>Cancel/Reject</option>
                    </select>
                </div>
            </div>
            <div class="form-group hideclass" style="margin-bottom: 8px;">
                <label class="form-label" for="full-name-1">Select Bank</label>
                <div class="form-control-wrap">
                    <select class="form-control form-select @error('bank_id') is-invalid @enderror" onchange="getBankCommission(this.value)" name="bank_id">
                        <option value="">Select Bank</option>
                        @foreach($banks as $bank)
                        <option @if($data->bank_id==$bank->id) selected @endif value="{{$bank->id.','.$bank->bank_commission}}">{{$bank->bank_name ?? ''}}</option>
                        @endforeach
                    </select>
                    @error('bank_id')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                  @enderror
              </div>
          </div>
          <div class="form-group hideclass" style="margin-bottom: 8px;">
            <label class="form-label" for="full-name-1">Commission up to</label>
            <div class="form-control-wrap">
                <input type="text" onkeypress='return event.charCode >= 48 && event.charCode <= 57 || (event.charCode ==46)' class="form-control @error('commission') is-invalid @enderror" value="{{$data->commission ?? ''}}" name="commission" placeholder="Enter Commission" id="commission">
                @error('commission')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
              @enderror
          </div>
      </div>
      <div class="form-group">
        <label class="form-label" for="full-name-1">Add Review</label>
        <div class="form-control-wrap">
            <textarea class="form-control" rows="3" name="review" placeholder="Please add message here...">{{$data->review??''}}</textarea>
        </div>
    </div>
</div>
@if($data->status!='Disbursement')
<div class="col-lg-12 mt-3">
    <div class="form-group">
        <div class="form-control-wrap" style="text-align: left;">

            <button type="submit" class="btn btn-primary">Update</button>
        </div>
    </div>
</div>
@endif
</div>
</form>

</div>
</div>
</div>
</div>
</div>
<div class="col-lg-8 col-xl-8 col-xxl-9">
    <div class="card">
     <div class="card-inner">
      <div class="nk-block">
       <div class="overline-title-alt mb-2 mt-2">Application Details (Created At : {{$data->created_at}})</div>
       <div class="row">
           <div class="row">
               <div class="col-lg-6 mt-2">
                <div class="form-group">
                    <label class="form-label" for="full-name-1">First Name</label>
                    <div class="form-control-wrap">
                        <input type="text" class="form-control" value="{{$data->first_name ?? '-'}}" name="first_name" disabled placeholder="Enter First Name" id="full-name-1">
                    </div>
                </div>
            </div>
            <div class="col-lg-6 mt-2">
                <div class="form-group">
                    <label class="form-label" for="full-name-1">Last Name</label>
                    <div class="form-control-wrap">
                        <input type="text" class="form-control" value="{{$data->last_name ?? '-'}}" name="first_name" disabled placeholder="Enter Last Name" id="full-name-1">
                    </div>
                </div>
            </div>
            <div class="col-lg-6 mt-2">
                <div class="form-group">
                    <label class="form-label" for="full-name-1">Email</label>
                    <div class="form-control-wrap">
                        <input type="text" class="form-control" value="{{$data->email ?? '-'}}" name="first_name" disabled placeholder="Enter Email" id="full-name-1">
                    </div>
                </div>
            </div>
            <div class="col-lg-6 mt-2">
                <div class="form-group">
                    <label class="form-label" for="full-name-1">Contact Number</label>
                    <div class="form-control-wrap">
                        <input type="text" class="form-control" value="{{$data->mobile_number ?? '-'}}" name="first_name" disabled placeholder="Enter Email" id="full-name-1">
                    </div>
                </div>
            </div>
            <div class="col-lg-6 mt-2">
                <div class="form-group">
                    <label class="form-label" for="full-name-1">Date Of Birth</label>
                    <div class="form-control-wrap">
                        <input type="text" class="form-control" value="{{$data->dob ?? '-'}}" name="first_name" disabled placeholder="Enter Email" id="full-name-1">
                    </div>
                </div>
            </div>
            <div class="col-lg-6 mt-2">
                <div class="form-group">
                    <label class="form-label" for="full-name-1">Gender</label>
                    <div class="form-control-wrap">
                        <input type="text" class="form-control" value="{{$data->gender ?? '-'}}" name="first_name" disabled placeholder="Enter Email" id="full-name-1">
                    </div>
                </div>
            </div>
            <div class="col-lg-6 mt-2">
                <div class="form-group">
                    <label class="form-label" for="full-name-1">Income Salary</label>
                    <div class="form-control-wrap">
                        <input type="text" class="form-control" value="{{$data->income_salary ?? '-'}}" name="first_name" disabled placeholder="Enter Email" id="full-name-1">
                    </div>
                </div>
            </div>
            <div class="col-lg-6 mt-2">
                <div class="form-group">
                    <label class="form-label" for="full-name-1">Qualification</label>
                    <div class="form-control-wrap">
                        <input type="text" class="form-control" value="{{$data->qualification ?? '-'}} Month" name="first_name" disabled placeholder="Enter Email" id="full-name-1">
                    </div>
                </div>
            </div>
            <div class="col-lg-6 mt-2">
                <div class="form-group">
                    <label class="form-label" for="full-name-1">PAN Number</label>
                    <div class="form-control-wrap">
                        <input type="text" class="form-control" value="{{$data->pan_number ?? '-'}}" name="first_name" disabled placeholder="Enter Email" id="full-name-1">
                    </div>
                </div>
            </div>

            <div class="col-lg-6 mt-2">
                <div class="form-group">
                    <label class="form-label" for="full-name-1">Current Pincode</label>
                    <div class="form-control-wrap">
                        <input type="text" class="form-control" value="{{$data->current_pincode ?? '-'}}" name="first_name" disabled placeholder="Enter Email" id="full-name-1">
                    </div>
                </div>
            </div>
            <div class="col-lg-6 mt-2">
                <div class="form-group">
                    <label class="form-label" for="full-name-1">Permanent Pincode</label>
                    <div class="form-control-wrap">
                        <input type="text" class="form-control" value="{{$data->permanent_pincode ?? '-'}}" name="first_name" disabled placeholder="Enter Email" id="full-name-1">
                    </div>
                </div>
            </div>
            <div class="col-lg-6 mt-2">
                <div class="form-group">
                    <label class="form-label" for="full-name-1">Office Pincode</label>
                    <div class="form-control-wrap">
                        <input type="text" class="form-control" value="{{$data->office_pincode ?? '-'}}" name="first_name" disabled placeholder="Enter Email" id="full-name-1">
                    </div>
                </div>
            </div>
            <div class="col-lg-6 mt-2">
                <div class="form-group">
                    <label class="form-label" for="full-name-1">Existing Card</label>
                    <div class="form-control-wrap">
                        <input type="text" class="form-control" value="{{$data->existing_card == 0 ? 'No' : 'Yes'}}" name="first_name" disabled placeholder="Enter Email" id="full-name-1">
                    </div>
                </div>
            </div>
            <div class="col-lg-6 mt-2">
                <div class="form-group">
                    <label class="form-label" for="full-name-1">Employment Type</label>
                    <div class="form-control-wrap">
                        <input type="text" class="form-control" value="{{$data->employment_type ?? '-'}}" name="first_name" disabled placeholder="Enter Email" id="full-name-1">
                    </div>
                </div>
            </div>
            <div class="col-lg-6 mt-2">
                <div class="form-group">
                    <label class="form-label" for="full-name-1">Company Name</label>
                    <div class="form-control-wrap">
                        <input type="text" class="form-control" value="{{$data->company_name ?? '-'}}" name="first_name" disabled placeholder="Enter Email" id="full-name-1">
                    </div>
                </div>
            </div>
            <div class="col-lg-6 mt-2">
                <div class="form-group">
                    <label class="form-label" for="full-name-1">Profession</label>
                    <div class="form-control-wrap">
                        <input type="text" class="form-control" value="{{$data->profession ?? '-'}}" name="first_name" disabled placeholder="Enter Email" id="full-name-1">
                    </div>
                </div>
            </div>
            <div class="col-lg-6 mt-2">
                <div class="form-group">
                    <label class="form-label" for="full-name-1">Designation</label>
                    <div class="form-control-wrap">
                        <input type="text" class="form-control" value="{{$data->designation ?? '-'}}" name="first_name" disabled placeholder="Enter Email" id="full-name-1">
                    </div>
                </div>
            </div>
            <div class="col-lg-6 mt-2">
                <div class="form-group">
                    <label class="form-label" for="full-name-1">Mother Name</label>
                    <div class="form-control-wrap">
                        <input type="text" class="form-control" value="{{$data->mother_name ?? '-'}}" name="first_name" disabled placeholder="Enter Email" id="full-name-1">
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

</div>
</div>
</div>
@if(count($documents)!=0)
<div class="col-lg-12 col-xl-12 col-xxl-12">
    <div class="card">
     <div class="card-inner">
      <div class="nk-block">
       <div class="overline-title-alt mb-2 mt-2">Uploaded Documents</div>
       <hr>
       <div class="row">
           <div class="row">
            @foreach($documents as $document)
            <div class="col-lg-4">
                <div class="form-group">
                    <label class="form-label" for="full-name-1">{{$document->name}}</label>
                    <a href="{{url('storage/app')}}/{{$document->image}}" target="_blank">{{$document->image}}</a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

</div>
</div>
</div>
@endif
</div>
</div>
</div>
</div>
</div>
</div>
@endsection
<script type="text/javascript">

    function getBankCommission(data)
    {
        data = data.split(',');
        $("#commission").val(data[1]);
    }
</script>

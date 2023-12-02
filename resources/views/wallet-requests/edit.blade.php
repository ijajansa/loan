@extends('admin-layouts.app')
@section('content')
<!-- content @s -->
<div class="nk-content ">
    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-block-head nk-block-head-sm">
                    <div class="nk-block-between">
                        <div class="nk-block-head-content">
                            <h3 class="nk-block-title page-title">View Wallet Requests</h3>

                        </div><!-- .nk-block-head-content -->
                    </div><!-- .nk-block-between -->
                </div><!-- .nk-block-head -->
                <div class="nk-block nk-block-lg">

                    <div class="card card-bordered card-preview">
                        <div class="card-inner">
                            <form method="POST" action="{{url('wallet-requests/edit')}}/{{$data->id}}" enctype="multipart/form-data">
                                @csrf
                                <div class="row g-4">
                                
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label class="form-label" for="full-name-1">DSA Name <span class="text-danger">*</span></label>
                                        <div class="form-control-wrap">
                                            <input type="text" class="form-control @error('full_name') is-invalid @enderror" value="{{old('full_name',$data->first_name.' '.$data->last_name)}}" name="full_name" placeholder="Enter Full Name" readonly id="full-name-1">
                                            @error('full_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label class="form-label" for="full-name-2">Accountant Name</label>
                                        <div class="form-control-wrap">
                                            <input type="text" class="form-control @error('accountant_name') is-invalid @enderror" value="{{old('accountant_name',$data->accountant_name)}}" name="accountant_name" placeholder="Enter Accountant Name" id="full-name-2" readonly>
                                            
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label class="form-label" for="full-name-2">Bank Name</label>
                                        <div class="form-control-wrap">
                                            <input type="text" class="form-control @error('bank_name') is-invalid @enderror" value="{{old('bank_name',$data->bank_name)}}" name="bank_name" placeholder="Enter Bank Name" id="full-name-2" readonly>
                                            
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label class="form-label" for="full-name-2">Account Number</label>
                                        <div class="form-control-wrap">
                                            <input type="text" class="form-control @error('account_number') is-invalid @enderror" value="{{old('account_number',$data->account_number)}}" name="account_number" placeholder="Enter Account Number" id="full-name-2" readonly>
                                            
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label class="form-label" for="full-name-2">IFSC Code</label>
                                        <div class="form-control-wrap">
                                            <input type="text" class="form-control @error('ifsc_code') is-invalid @enderror" value="{{old('ifsc_code',$data->ifsc_code)}}" name="ifsc_code" placeholder="Enter IFSC Code" id="full-name-2" readonly>
                                            
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label class="form-label" for="full-name-2">Account Type</label>
                                        <div class="form-control-wrap">
                                            <input type="text" class="form-control @error('account_type') is-invalid @enderror" value="{{old('account_type',$data->account_type)}}" name="account_type" placeholder="Enter Account Type" id="full-name-2" readonly>
                                            
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label class="form-label" for="full-name-2">Requested Amount</label>
                                        <div class="form-control-wrap">
                                            <input type="text" class="form-control @error('amount') is-invalid @enderror" value="{{old('amount',$data->amount)}}" name="amount" placeholder="Enter Amount" id="full-name-2" readonly>
                                            
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="col-lg-12">
                                    <hr>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label class="form-label" for="full-name-9">Request Status <span class="text-danger">*</span></label>
                                        <div class="form-control-wrap">
                                            <select id="full-name-9" class="form-control form-select @error('status') is-invalid @enderror" name="status">
                                                <option value="">Select Request Status</option>
                                                <option value="success" @if($data->status=='success') selected @endif>Approve</option>
                                                <option value="pending" @if($data->status=='pending') selected @endif>Pending</option>
                                                <option value="reject" @if($data->status=='reject') selected @endif>Reject</option>
                                            </select>
                                            @error('status')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror

                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label class="form-label" for="full-name-2">Transaction ID <span class="text-danger">*</span></label>
                                        <div class="form-control-wrap">
                                            <input type="text" class="form-control @error('transaction_id') is-invalid @enderror" value="{{old('transaction_id',$data->transaction_id)}}" name="transaction_id" placeholder="Enter Transaction ID" id="full-name-2">
                                            
                                        </div>
                                    </div>
                                </div>
                                @if($data->status=='pending')
                                <div class="col-12">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-lg btn-primary">Update Details</button>
                                    </div>
                                </div>
                                @endif
                            </div>
                        </form>
                    </div>
                </div><!-- .card-preview -->
            </div> <!-- nk-block -->
        </div>
    </div>
</div>
</div>
<script>
    function showImg(event){
        $('#showImage').show();
        $('#showIcon').hide();
        var output6 = document.getElementById('showImage');
        output6.src = URL.createObjectURL(event.target.files[0]);
        output6.onload = function() {
          URL.revokeObjectURL(output6.src)
      }
  }

</script>
@endsection

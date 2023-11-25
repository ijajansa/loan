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
                            <h3 class="nk-block-title page-title">Add New Sub DSA</h3>

                        </div><!-- .nk-block-head-content -->
                    </div><!-- .nk-block-between -->
                </div><!-- .nk-block-head -->
                <div class="nk-block nk-block-lg">

                    <div class="card card-bordered card-preview">
                        <div class="card-inner">
                            <form method="POST" action="{{url('sub-dsa/add')}}" enctype="multipart/form-data">
                                @csrf
                                <div class="row g-4">
                                   <div class="col-lg-12">
                                    <h5 class="nk-block-title">Register Sub-DSA Form</h5>
                                    <hr>
                                </div>
                                
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label class="form-label" for="full-name-59">Select DSA <span class="text-danger">*</span></label>
                                        <div class="form-control-wrap">
                                            <select id="full-name-59" data-search="on" class="form-control form-select @error('agent_id') is-invalid @enderror" name="agent_id">
                                                <option value="">Select DSA</option>
                                                @foreach($agents as $agent)
                                                <option value="{{$agent->id}}" @if(old('agent_id')==$agent->id) selected  @endif >{{$agent->first_name.' '.$agent->last_name}}</option>
                                                @endforeach
                                            </select>
                                            @error('agent_id')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror

                                        </div>
                                    </div>
                                </div>
                                
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label class="form-label" for="full-name-1">First Name <span class="text-danger">*</span></label>
                                        <div class="form-control-wrap">
                                            <input type="text" class="form-control @error('first_name') is-invalid @enderror" value="{{old('first_name')}}" name="first_name" placeholder="Enter First Name" id="full-name-1">
                                            @error('first_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label class="form-label" for="full-name-2">Middle Name</label>
                                        <div class="form-control-wrap">
                                            <input type="text" class="form-control @error('middle_name') is-invalid @enderror" value="{{old('middle_name')}}" name="middle_name" placeholder="Enter Middle Name" id="full-name-2">
                                            @error('middle_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label class="form-label" for="full-name-3">Last Name <span class="text-danger">*</span></label>
                                        <div class="form-control-wrap">
                                            <input type="text" class="form-control @error('last_name') is-invalid @enderror" value="{{old('last_name')}}" name="last_name" placeholder="Enter Last Name" id="full-name-3">
                                            @error('last_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label class="form-label" for="full-name-4">Email ID <span class="text-danger">*</span></label>
                                        <div class="form-control-wrap">
                                            <input type="email" class="form-control @error('email') is-invalid @enderror" value="{{old('email')}}" name="email" placeholder="Enter Email ID" id="full-name-4">
                                            @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label class="form-label" for="full-name-5">Mobile Number <span class="text-danger">*</span></label>
                                        <div class="form-control-wrap">
                                            <input type="text" class="form-control @error('mobile_number') is-invalid @enderror" value="{{old('mobile_number')}}" name="mobile_number" placeholder="Enter Mobile Number" id="full-name-5">
                                            @error('mobile_number')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label class="form-label" for="full-name-6">Whatsapp Number <span class="text-danger">*</span></label>
                                        <div class="form-control-wrap">
                                            <input type="text" class="form-control @error('whatsapp_number') is-invalid @enderror" value="{{old('whatsapp_number')}}" name="whatsapp_number" placeholder="Enter Whatsapp Number" id="full-name-6">
                                            @error('whatsapp_number')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>


                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label class="form-label" for="full-name-7">Permanent Account Number (PAN) <span class="text-danger">*</span></label>
                                        <div class="form-control-wrap">
                                            <input type="text" class="form-control @error('pan_number') is-invalid @enderror" value="{{old('pan_number')}}" name="pan_number" placeholder="Enter PAN Number" id="full-name-7">
                                            @error('pan_number')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label class="form-label" for="full-name-8">Aadhar Number <span class="text-danger">*</span></label>
                                        <div class="form-control-wrap">
                                            <input type="text" class="form-control @error('aadhar_number') is-invalid @enderror" value="{{old('aadhar_number')}}" name="aadhar_number" placeholder="Enter Aadhar Number" id="full-name-8">
                                            @error('aadhar_number')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label class="form-label" for="full-name-13">Password <span class="text-danger">*</span></label>
                                        <div class="form-control-wrap">
                                            <input type="text" class="form-control @error('password') is-invalid @enderror" value="{{old('password')}}" name="password" placeholder="Enter Password" id="full-name-13">
                                            @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label class="form-label" for="phone-no-1">Profile Photo</label>
                                        <div class="form-control-wrap">
                                            <input type="file" class="form-control @error('profile') is-invalid @enderror" name="profile" value="{{old('profile')}}" id="phone-no-1" onchange="showImg(event)"/>
                                            <img id="showImage"  style="height:100px; width:100px;">
                                            <i id="showIcon" class="material-icons">add_a_photo</i>
                                            @error('profile')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <h5 class="nk-block-title">Goods and Service Tax Details</h5>
                                    <hr>
                                </div>

                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label class="form-label" for="full-name-9">GST Type <span class="text-danger">*</span></label>
                                        <div class="form-control-wrap">
                                            <select id="full-name-9" class="form-control form-select @error('gst_type') is-invalid @enderror" name="gst_type">
                                                <option value="">Select GST Type</option>
                                                <option value="Regular">Regular</option>
                                                <option value="Composit">Composit</option>
                                                <option value="Other">Other</option>
                                            </select>
                                            @error('gst_type')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror

                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label class="form-label" for="full-name-10">GST Number <span class="text-danger">*</span></label>
                                        <div class="form-control-wrap">
                                            <input type="text" class="form-control @error('gst_number') is-invalid @enderror" value="{{old('gst_number')}}" name="gst_number" placeholder="Enter GST Number" id="full-name-10">
                                            @error('gst_number')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>


                                <div class="col-lg-12">
                                    <h5 class="nk-block-title">Residence Address</h5>
                                    <hr>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-label" for="full-name-11">Address <span class="text-danger">*</span></label>
                                        <div class="form-control-wrap">
                                            <textarea rows="4" class="form-control @error('address') is-invalid @enderror" name="address"  id="full-name-11" placeholder="Residence Address">{{old('address')}}</textarea>
                                            @error('address')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label class="form-label" for="full-name-12">Pincode <span class="text-danger">*</span></label>
                                                <div class="form-control-wrap">
                                                    <input type="number" class="form-control @error('pincode') is-invalid @enderror" value="{{old('pincode')}}" name="pincode" placeholder="Enter Pincode" id="full-name-12">
                                                    @error('pincode')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 mt-3">
                                            <div class="form-group">
                                                <div class="form-control-wrap">
                                                    <input type="text" class="form-control @error('city') is-invalid @enderror" value="{{old('city')}}" name="city" placeholder="City">
                                                    @error('city')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 mt-3">
                                            <div class="form-group">
                                                <div class="form-control-wrap">
                                                    <input type="text" class="form-control @error('state') is-invalid @enderror" value="{{old('state')}}" name="state" placeholder="State">
                                                    @error('state')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 mt-3">
                                            <div class="form-group">
                                                <div class="form-control-wrap">
                                                    <input type="text" class="form-control @error('country') is-invalid @enderror" value="{{old('country')}}" name="country" placeholder="Country">
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

                                
                                
                                <div class="col-12">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-lg btn-primary">Save</button>
                                    </div>
                                </div>
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
    $("#showImage").hide();
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

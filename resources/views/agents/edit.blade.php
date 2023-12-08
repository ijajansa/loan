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
                            <h3 class="nk-block-title page-title">Update DSA Details</h3>

                        </div><!-- .nk-block-head-content -->
                    </div><!-- .nk-block-between -->
                </div><!-- .nk-block-head -->
                <div class="nk-block nk-block-lg">

                    <div class="card card-bordered card-preview">
                        <div class="card-inner">
                            <form method="POST" action="{{url('dsa/edit')}}/{{$data->id}}" enctype="multipart/form-data">
                                @csrf
                                <div class="row g-4">
                                 <div class="col-lg-12">
                                    <h5 class="nk-block-title">Register DSA Form</h5>
                                    <hr>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label class="form-label" for="full-name-1">First Name <span class="text-danger">*</span></label>
                                        <div class="form-control-wrap">
                                            <input type="text" class="form-control @error('first_name') is-invalid @enderror" value="{{old('first_name',$data->first_name)}}" name="first_name" placeholder="Enter First Name" id="full-name-1" onkeypress="return (event.charCode > 64 && 
                                            event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || (event.charCode ==32)">
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
                                            <input type="text" class="form-control @error('middle_name') is-invalid @enderror" value="{{old('middle_name',$data->middle_name)}}" name="middle_name" placeholder="Enter Middle Name" id="full-name-2" onkeypress="return (event.charCode > 64 && 
                                            event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || (event.charCode ==32)">
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
                                            <input type="text" class="form-control @error('last_name') is-invalid @enderror" value="{{old('last_name',$data->last_name)}}" name="last_name" placeholder="Enter Last Name" id="full-name-3" onkeypress="return (event.charCode > 64 && 
                                            event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || (event.charCode ==32)">
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
                                            <input type="email" class="form-control @error('email') is-invalid @enderror textLower" value="{{old('email',$data->email)}}" name="email" placeholder="Enter Email ID" id="full-name-4">
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
                                            <input type="text" class="form-control @error('mobile_number') is-invalid @enderror" value="{{old('mobile_number',$data->mobile_number)}}" name="mobile_number" placeholder="Enter Mobile Number" id="full-name-5" onkeypress='return event.charCode >= 48 && event.charCode <= 57' maxlength="10">
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
                                            <input type="text" class="form-control @error('whatsapp_number') is-invalid @enderror" value="{{old('whatsapp_number',$data->whatsapp_number)}}" name="whatsapp_number" placeholder="Enter Whatsapp Number" onkeypress='return event.charCode >= 48 && event.charCode <= 57' maxlength="10" id="full-name-6">
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
                                            <input type="text" class="form-control @error('pan_number') is-invalid @enderror textUpper" value="{{old('pan_number',$data->pan_number)}}" name="pan_number" placeholder="Enter PAN Number" id="full-name-7" maxlength="10" >
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
                                            <input type="text" class="form-control @error('aadhar_number') is-invalid @enderror" value="{{old('aadhar_number',$data->aadhar_number)}}" name="aadhar_number" placeholder="Enter Aadhar Number" id="full-name-8" onkeypress='return event.charCode >= 48 && event.charCode <= 57' maxlength="12">
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
                                            <a tabindex="-1" href="javascript:void(0)" class="form-icon form-icon-right passcode-switch lg" data-target="password"><em onclick="show1()" class="passcode-icon icon-show icon ni ni-eye"></em><em onclick="hide1()" class="passcode-icon icon-hide icon ni ni-eye-off"></em></a>
                                            <input type="password" class="form-control @error('password') is-invalid @enderror" value="{{old('password',$data->visible_password)}}" name="password" placeholder="Enter Password" id="password" >
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
                                            <img id="showImage" @if($data->profile!=null) src="{{url('storage/app')}}/{{$data->profile}}" @endif style="height:100px; width:100px;">
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
                                                <option value="Regular" @if($data->gst_type=='Regular') selected @endif>Regular</option>
                                                <option value="Composit" @if($data->gst_type=='Composit') selected @endif>Composit</option>
                                                <option value="Other" @if($data->gst_type=='Other') selected @endif>Other</option>
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
                                            <input type="text" class="form-control @error('gst_number') is-invalid @enderror" value="{{old('gst_number',$data->gst_number)}}" name="gst_number" placeholder="Enter GST Number" id="full-name-10" maxlength="15" onkeypress='return (event.charCode >= 48 && event.charCode <= 57) || (event.charCode > 64 && event.charCode < 91)' >
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
                                            <textarea rows="4" class="form-control @error('address') is-invalid @enderror" name="address"  id="full-name-11" placeholder="Residence Address">{{old('address',$data->address)}}</textarea>
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
                                                    <input type="text" class="form-control @error('pincode') is-invalid @enderror" value="{{old('pincode',$data->pincode)}}" name="pincode" placeholder="Enter Pincode" id="full-name-12" onkeypress='return event.charCode >= 48 && event.charCode <= 57' maxlength="6">
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
                                                    <input type="text" class="form-control @error('city') is-invalid @enderror" value="{{old('city',$data->city)}}" name="city" placeholder="City" onkeypress="return (event.charCode > 64 && 
                                                    event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || (event.charCode ==32)">
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
                                                    <input type="text" class="form-control @error('state') is-invalid @enderror" value="{{old('state',$data->state)}}" name="state" placeholder="State" onkeypress="return (event.charCode > 64 && 
                                                    event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || (event.charCode ==32)">
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
                                                    <input type="text" class="form-control @error('country') is-invalid @enderror" value="{{old('country',$data->country)}}" name="country" placeholder="Country" onkeypress="return (event.charCode > 64 && 
                                                    event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || (event.charCode ==32)">
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
                                        <button type="submit" class="btn btn-lg btn-primary">Update Details</button>
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
     $('.textUpper').keyup(function() { 
        this.value = this.value.toLocaleUpperCase(); 
    }); 
    $('.textLower').keyup(function() { 
        this.value = this.value.toLocaleLowerCase(); 
    });

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
